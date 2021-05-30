<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ValidateDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var Object $this */
        $validate = $this->validate($request);
        $response = [
            'status_code' => 400,
            'error' => true,
            'error_message' => 'Invalid data',
            'error_description' => $validate->messages() // @phpstan-ignore-line
        ];

        if ($validate->passes()) {
            $response = $next($request);
        }

        return $response;
    }

    private function defineModel(string $namespace): ?Model
    {
        $model =  null;

        if (class_exists($namespace)) {
            $model = new $namespace();
        }

        return $model;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Validation\Validator
     */
    private function validate(Request $request)
    {
        $routerArr = (array) $request->route();
        $alias = $routerArr[1]['as'];
        /** @var Object $this */
        $model = $this->defineModel($alias);

        if (empty($model)) {
            throw new InvalidArgumentException('Model ' . $alias . ' doesnt exists');
        }

        return Validator::make(
            $request->toArray(),
            $model->rules
        );
    }
}
