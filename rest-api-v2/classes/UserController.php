<?php
class UserController {
    private $userRepository;
    private $request;

    public function __construct(DataRepositoryInterface $userRepository, RequestInterface $request) {
        $this->userRepository = $userRepository;
        $this->request = $request;
    }

    public function getAllUsers() {
        return new Response(200, json_encode($this->userRepository->getAll()));
    }

    public function getUserById($id) {
        $user = $this->userRepository->getById($id);
        if (empty($user)) {
            return new Response(404, json_encode(['error' => 'User not found']));
        }
        return new Response(200, json_encode($user[0]));
    }

    public function createUser() {
        $data = $this->request->getBody();
        $this->userRepository->create($data);
        return new Response(201, json_encode(['message' => 'User created']));
    }

    public function updateUser($id) {
        $data = $this->request->getBody();
        $this->userRepository->update($id, $data);
        return new Response(200, json_encode(['message' => 'User updated']));
    }

    public function deleteUser($id) {
        $this->userRepository->delete($id);
        return new Response(204, '');
    }
}