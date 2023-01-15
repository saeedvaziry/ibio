<?php

namespace App\LinkTypes;

use App\Models\Link;
use Illuminate\View\View;

interface LinkTypeInterface
{
    public function rules(): array;

    public function updateData(array $input, $field): Link;

    public function fields(): array;

    public function isDataValid(): bool;

    public function render(): string|View;
}
