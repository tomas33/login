<?PHP

$container[RegisterController::class] = function ($container) {
    return new RegisterController($container[EntityManager::class]);
};