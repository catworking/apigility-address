<?php
namespace ApigilityAddress\V1\Rest\Address;

use ApigilityCatworkFoundation\Base\ApigilityResource;
use Zend\ServiceManager\ServiceManager;
use ZF\ApiProblem\ApiProblem;

class AddressResource extends ApigilityResource
{
    /**
     * @var \ApigilityAddress\Service\AddressService
     */
    protected $addressService;

    public function __construct(ServiceManager $services)
    {
        parent::__construct($services);
        $this->addressService = $this->serviceManager->get('ApigilityAddress\Service\AddressService');
    }

    public function create($data)
    {
        try {
            return new AddressEntity($this->addressService->createAddress($data));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function fetch($id)
    {
        try {
            return new AddressEntity($this->addressService->getAddress($id));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function fetchAll($params = [])
    {
        try {
            return new AddressCollection($this->addressService->getAddresses($params));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function patch($id, $data)
    {
        try {
            return new AddressEntity($this->addressService->updateAddress($id, $data));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            return $this->addressService->deleteAddress($id);
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }
}
