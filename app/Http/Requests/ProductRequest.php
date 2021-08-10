<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "type" => "required|in:DIGITAL,PHYSICAL,SERVICE",
            "delivery_type" => "required|in:DOWNLOAD,MEMBER_AREA",
            "name" => "required",
            "description" => "nullable",
            "sales_page_url" => "|url",
            "image" => "required",
            "warranty" => "required:integer",
            "email_support" => "required|email",
            "phone_support" => "nullable",
            "url_thankyou_billet" => "nullable|url",
            "url_thankyou_card" => "nullable|url",
            "url_thankyou_pix" => "nullable|url",
            "invoice_description" => "nullable",
            "category_id" => "required",
        ];
    }
}
