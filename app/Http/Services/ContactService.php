<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\Repositories\ContactRepository\{ContactRepositoryEloquent, ContactRepositoryInterface};
use Symfony\Component\HttpKernel\Exception\HttpException;

class ContactService extends Service
{

    protected ContactRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new ContactRepositoryEloquent();
        parent::__construct();
    }

    public function saveContactForPerson(array $contacts): void
    {
        if (!$this->repository instanceof ContactRepositoryInterface) throw new HttpException(405, 'Operacao nao permitida');

        $this->repository->saveContactForPerson($contacts);
    }
}
