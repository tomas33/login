<?php

use App\UsesCases\SignUpUseCase;

$container = $app->getContainer();

$container[SignUpUseCase::class] = function ($c) {
    return new SignUpUseCase(
        );
};