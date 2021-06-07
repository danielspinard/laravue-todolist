<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'completed' => 'boolean'
        ];
    }

    /**
     * @return bool
     */
    public function hasItemCompleted(): bool
    {
        $item = (object) $this->item;
        
        if (isset($item->completed) && $item->completed === 'true') {
            return true;
        }

        return false;
    }
}
