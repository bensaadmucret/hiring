<?php

declare(strict_types=1);


use Behat\Behat\Context\Context;
use Fulll\Domain\Vehicle\Vehicle;


class RegisterVehicleContext implements Context
{
    private array $fleet = [];
    private Vehicle $vehicle;
    private \Fulll\Helpers\UniqueId $vehicleId;
    private \Fulll\Helpers\GeneratePlateNumber $vehiclePlateNumber;
    private string $location;

    /**
     * @Given my fleet
     */
    public function myFleet()
    {
        $this->fleet = [];
    }

    /**
     * @Given a vehicle
     */
    public function aVehicle()
    {
        $this->vehicleId = \Fulll\Helpers\UniqueId::generate();
        $this->vehiclePlateNumber = new \Fulll\Helpers\GeneratePlateNumber();
        $this->vehicle = new Vehicle( $this->vehiclePlateNumber, $this->vehicleId );
    }

    /**
     * @When I register this vehicle into my fleet
     */
    public function iRegisterThisVehicleIntoMyFleet()
    {
        $this->fleet[$this->vehicle->getId()->isValid()] = $this->vehicle;
    }

    /**
     * @Then this vehicle should be part of my vehicle fleet
     */
    public function thisVehicleShouldBePartOfMyVehicleFleet()
    {
        if (!in_array($this->vehicle, $this->fleet)) {
            throw new \Exception('Vehicle is not part of fleet');
        }
    }

    /**
     * @Given I have registered this vehicle into my fleet
     */
    public function iHaveRegisteredThisVehicleIntoMyFleet()
    {
        $this->iRegisterThisVehicleIntoMyFleet();
    }

    /**
     * @When I try to register this vehicle into my fleet
     */
    public function iTryToRegisterThisVehicleIntoMyFleet()
    {
        // Check if the vehicle is already part of the fleet
        if (isset($this->fleet[$this->vehicle->getId()->equals($this->vehicleId)])) {
            throw new \Exception('Vehicle is already part of fleet');
        }

    }


    /**
     * @Then I should be informed this this vehicle has already been registered into my fleet
     */
    public function iShouldBeInformedThisThisVehicleHasAlreadyBeenRegisteredIntoMyFleet()
    {
        // Une exception sera levée dans la méthode iTryToRegisterThisVehicleIntoMyFleet()
    }

    /**
     * @Given the fleet of another user
     */
    public function theFleetOfAnotherUser()
    {
        // Create a fake fleet for user 1
        $vehicleId1 = \Fulll\Helpers\UniqueId::generate();
        $numberPlate = new \Fulll\Helpers\GeneratePlateNumber();
        $vehicle1 = new Vehicle($numberPlate, $vehicleId1);
        $this->fleet[$vehicleId1->isValid()] = $vehicle1;

        // Create a fake fleet for user 2`
        $vehicleId2 = \Fulll\Helpers\UniqueId::generate();
        $numberPlate2 = new \Fulll\Helpers\GeneratePlateNumber();
        $vehicle2 = new Vehicle($numberPlate2, $vehicleId2);
        $this->fleet[$vehicleId2->isValid()] = $vehicle2;
    }


    /**
     * @Given this vehicle has been registered into the other user's fleet
     */
    public function thisVehicleHasBeenRegisteredIntoTheOtherUsersFleet()
    {
        // Une exception sera levée dans la méthode iTryToRegisterThisVehicleIntoMyFleet()
    }

}