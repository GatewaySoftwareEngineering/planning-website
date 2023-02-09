<?php

namespace App\Http\Traits;

use Closure;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCodes;

/**
 *
 */
trait RestfulRespond
{
    /**
     * @var int
     */
    protected $statusCode = ResponseCodes::HTTP_OK;

    /**
     * @return int|string
     */
    public function getLimit()
    {
        $limit = Request::input('limit');

        return $limit && is_numeric($limit) && $limit >= 0 ? $limit : 0;
    }

    /**
     * @return int|string
     */
    public function getPage()
    {
        $page = Request::input('page');

        return $page && is_numeric($page) && $page > 0 ? $page : 1;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function respondWithPredefinedError($key)
    {
        $error = [
            'error' => config('error-codes.' . $key)
        ];

        return Response::json($error, $this->getStatusCode());
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param LengthAwarePaginator $pagination
     * @param array $meta_data
     * @return JsonResponse
     */
    public function respondWithPagination($pagination, $meta_data = [])
    {
        $data = [
            'data' => array_values($pagination->items()),
            'pagination' => [
                'total_count' => (int)$pagination->total(),
                'total_pages' => (int)ceil($pagination->total() / $pagination->perPage()),
                'current_page' => (int)$pagination->currentPage(),
                'limit' => (int)$pagination->perPage(),
            ],
        ];

        foreach ($meta_data as $key => $value) {
            $data[$key] = is_array($value) ? array_values($value)
                : $value;
        }

        return $this->respond($data);
    }

    /**
     * @param $data
     * @param array $headers
     * @return JsonResponse
     */
    public function respond($data, $headers = [])
    {
        // $data = $this->filterNotNull(json_decode(json_encode($data)));

        return Response::json($data, $this->getStatusCode(), $headers, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $data
     * @param array $headers
     * @return JsonResponse
     */
    public function respondForExportToExcel($data, $headers = [])
    {
        $data = $this->filterNotNull(json_decode(json_encode($data)), function ($item) {
            return (!is_array($item) || count($item) > 0);
        });

        return Response::json($data, $this->getStatusCode(), $headers, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $array
     * @param Closure|null $filterCallback
     * @return array
     */
    private function filterNotNull($array, Closure $filterCallback = null)
    {
        $array = array_map(function ($item) use ($filterCallback) {
            return is_array($item) || is_object($item) ? $this->filterNotNull((array)$item, $filterCallback) : $item;
        }, (array)$array);

        return array_filter($array, $filterCallback ?? function ($item) {
            return $item !== "" && $item !== null && (!is_array($item) || count($item) > 0);
        });
    }

    /**
     * @param string $message_en
     * @param string $message_ar
     * @return mixed
     */
    public function respondBadRequest($message = 'Bad Request!')
    {
        return $this->setStatusCode(ResponseCodes::HTTP_BAD_REQUEST)->respondWithError($message);
    }

    /**
     * @param $message
     * @return mixed
     */
    private function respondWithError($message)
    {
        return Response::json([
            'message' => $message,
        ], $this->getStatusCode());
    }

    /**
     * @param string $message_en
     * @param string $message_ar
     * @return mixed
     */
    public function respondMethodNotAllowed($message_en = 'Method Not Allowed!', $message_ar = 'الإجرائية غير مسموحة!')
    {
        return $this->setStatusCode(ResponseCodes::HTTP_METHOD_NOT_ALLOWED)->respondWithError($message_en, $message_ar);
    }

    /**
     * @param string $message_en
     * @param string $message_ar
     * @return mixed
     */
    public function respondNotFound($message_en = 'Not Found!', $message_ar = 'غير موجود!')
    {
        return $this->setStatusCode(ResponseCodes::HTTP_NOT_FOUND)->respondWithError($message_en, $message_ar);
    }

    /**
     * @param string $message_en
     * @param string $message_ar
     * @return mixed
     */
    public function respondInternalError($message_en = 'Internal Error!', $message_ar = 'خطاً في المخدم!')
    {
        return $this->setStatusCode(ResponseCodes::HTTP_INTERNAL_SERVER_ERROR)->respondWithError(
            $message_en,
            $message_ar
        );
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotAuthorized($message = 'Not Authorized!')
    {
        return $this->setStatusCode(ResponseCodes::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * @param string $message_en
     * @param string $message_ar
     * @return mixed
     */
    public function respondForbidden($message_en = 'Forbidden!', $message_ar = 'ممنوع!')
    {
        return $this->setStatusCode(ResponseCodes::HTTP_FORBIDDEN)->respondWithError($message_en, $message_ar);
    }

    /**
     * @param string $message_en
     * @param string $message_ar
     * @return mixed
     */
    public function respondTooManyRequests($message_en = 'Too Many Requests!', $message_ar = 'عدد كبير من الطلبات!')
    {
        return $this->setStatusCode(ResponseCodes::HTTP_TOO_MANY_REQUESTS)->respondWithError($message_en, $message_ar);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotAcceptable($message = 'Not Acceptable!')
    {
        return $this->setStatusCode(ResponseCodes::HTTP_NOT_ACCEPTABLE)->respondWithError($message);
    }

    /**
     * @param string $message_en
     * @param string $message_ar
     * @return mixed
     */
    public function respondNoContent($message_en = 'Operation done', $message_ar = 'تمت العملية بنجاح')
    {
        return $this->setStatusCode(ResponseCodes::HTTP_NO_CONTENT)->respondWithMessage($message_en, $message_ar);
    }

    /**
     * @return mixed
     */
    public function respondWithMessage($data,$message)
    {
        $json = [];
        $json['message'] = $message;
        $json['data'] = $data;
        return Response::json($json, $this->getStatusCode());
    }

    /**
     * @param string $message_en
     * @param string $message_ar
     * @return mixed
     */
    public function respondConflict($message_en = 'Operation done', $message_ar = 'تمت العملية بنجاح')
    {
        return $this->setStatusCode(ResponseCodes::HTTP_CONFLICT)->respondWithMessage($message_en, $message_ar);
    }
}
