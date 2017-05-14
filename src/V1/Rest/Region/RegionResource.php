<?php
namespace ApigilityAddress\V1\Rest\Region;

use ApigilityCatworkFoundation\Base\ApigilityResource;
use Zend\ServiceManager\ServiceManager;
use ZF\ApiProblem\ApiProblem;

class RegionResource extends ApigilityResource
{
    /**
     * @var \ApigilityAddress\Service\RegionService
     */
    protected $regionService;

    public function __construct(ServiceManager $services)
    {
        parent::__construct($services);
        $this->regionService = $this->serviceManager->get('ApigilityAddress\Service\RegionService');
    }

    public function create($data)
    {
        try {
            return new RegionEntity($this->regionService->createRegion($data));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function fetch($id)
    {
        try {
            return new RegionEntity($this->regionService->getRegion($id));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function fetchAll($params = [])
    {
        try {
            return new RegionCollection($this->regionService->getRegions($params));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function patch($id, $data)
    {
        try {
            return new RegionEntity($this->regionService->updateRegion($id, $data));
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            return $this->regionService->deleteRegion($id);
        } catch (\Exception $exception) {
            return new ApiProblem($exception->getCode(), $exception->getMessage());
        }
    }
}
