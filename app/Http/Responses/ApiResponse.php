<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Validation\ValidationException;

class ApiResponse implements Responsable
{
    protected int $httpCode;
    protected array $data;
    protected string $errorMessage;

    public function __construct(int $httpCode, array $data = [], string $errorMessage = '')
    {

        if (! (($httpCode >= 200 && $httpCode <= 300) || ($httpCode >= 400 && $httpCode <= 600))) {
          throw new \RuntimeException($httpCode . ' is not valid');
        }

        $this->httpCode = $httpCode;
        $this->data = $data;
        $this->errorMessage = $errorMessage;
    }

    public function toResponse($request): \Illuminate\Http\JsonResponse
    {
        $payload = match (true) {
            $this->httpCode >= 500 => ['error_message' => 'Server error'],
            $this->httpCode >= 400 => ['sts' => $this->httpCode,'sts_message' => $this->errorMessage],
            $this->httpCode >= 200 => ['sts' => $this->httpCode,'sts_message' => 'ok', 'data' => $this->data],
        };

        return response()->json(
            data: $payload,
            status: 200,
            options: JSON_UNESCAPED_UNICODE
        );
    }

    public static function ok(array $data)
    {
        return new static(200, $data);
    }

    public static function notFound(string $errorMessage = "Item not found")
    {
        return new static(404, errorMessage: $errorMessage);
    }

    public static function errorUnprocessableEntity(string $errorMessage): static
    {
        return new static(422, errorMessage: $errorMessage);
    }

    public static function errorValidationFailed(ValidationException $e)
    {
        $errorMessage = $e->validator->errors()->all();
        $errorMessages = implode(", ", $errorMessage);
        // Or $errorMessage = $e->getMessage();
        // Or your custom logic
        return self::errorUnprocessableEntity($errorMessages);
    }

    //add any other static methods here

}
