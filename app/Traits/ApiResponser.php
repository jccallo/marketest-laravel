<?php

namespace App\Traits;

use ArrayObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

trait ApiResponser
{
  // basico
  private function successResponse($data, $code)
  {
      return response()->json($data, $code);
  }

  // mostrar error
  protected function errorResponse($message, $code)
  {
      return response()->json([
          'errors' => $message,
          'code' => $code
      ], $code);
  }

  // mostrar coleccion
  protected function showAll($response, $code = 200)
  {
      $ok = collect();
      if ($response instanceof Collection) {
          $ok->put('data', $response);
      }
      return $this->successResponse($ok, $code);
  }

  // mostrar item
  protected function showOne(Model $response, $code = 200)
	{
        $ok = collect();
        $ok->put('data', $response);

		return $this->successResponse($ok, $code);
	}

  // mostrar mensaje
  protected function showMessage($message, $code = 200)
	{
        $ok = collect();
        $ok->put('data', $message);
		return $this->successResponse($ok, $code);
	}
}