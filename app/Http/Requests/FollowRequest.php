<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use App\Library\ConstantsLibrary;

/**
 * Class FollowRequest
 * @package App\Http\Requests
 * @author Joven Pajanustan
 * @version 1.0.0
 * @since 2023.03.25
 */
class FollowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'follower_id' => 'required',
            'followed_id' => 'required',
        ];
    }
    
    /**
     * Laravel Validator's failed validation
     *
     * @param  mixed $oValidator
     * @return JsonResponse
     */
    protected function failedValidation(Validator $oValidator): JsonResponse
    {
        throw new HttpResponseException(response()->json(
            ['errors' => $oValidator->errors()->first()],
            ConstantsLibrary::CODE_422,
            ConstantsLibrary::DEFAULT_HEADERS,
            JSON_PRETTY_PRINT
        ));
    }
}
