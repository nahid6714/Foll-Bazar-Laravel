<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait GeneratesHexId
{
    protected static function bootGeneratesHexId(): void
    {
        static::creating(function ($model) {
            if (empty($model->getKey())) {
                $model->setAttribute(
                    $model->getKeyName(),
                    str_replace('-', '', (string) Str::uuid())
                );
            }
        });
    }

    public function initializeGeneratesHexId(): void
    {
        $this->incrementing = false;
        $this->keyType = 'string';
    }
}