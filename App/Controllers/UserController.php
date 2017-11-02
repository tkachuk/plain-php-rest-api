<?php
namespace App\Controllers;

class UserController extends Controller
{
    private $usersCollection = [
        1 => [
            'id'       => 1,
            'name'     => 'Mike',
            'position' => 'Developer',
        ],
        5 => [
            'id'       => 1,
            'name'     => 'Bob',
            'position' => 'QA',
        ],
        15 => [
            'id'       => 1,
            'name'     => 'Leonora',
            'position' => 'PM',
        ],
    ];

    /**
     * @return string
     */
    public function getUsers()
    {
        return $this->jsonResponse($this->usersCollection);
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function getUser($id)
    {
        if (isset($this->usersCollection[$id])) {
            return $this->jsonResponse($this->usersCollection[$id]);
        }

        return $this->jsonResponse([], 404);
    }
}
