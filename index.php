<?php
  
// Интерфейс для транспортных средств
interface VehicleInterface
{
    public function moveForward(): void;
    public function moveBackward(): void;
    public function getSpeed(): int;
    public function setSpeed(int $speed): void;
    public function honk(): void; // Добавлен метод сигнала
    public function setInterior(string $material): void; // Добавлен метод установки отделки салона
    public function getInterior(): string; // Добавлен метод получения отделки салона
}

// Интерфейс для спецтехники
interface SpecialEquipmentInterface
{
    public function useSpecialAbility(): void;
}

// Абстрактный класс для всех транспортных средств
abstract class Vehicle implements VehicleInterface
{
    protected int $speed = 0;
    protected string $interior = 'стандарт'; // Добавленное свойство отделки салона

    public function moveForward(): void
    {
        echo "Еду вперед со скоростью {$this->speed} км/ч\n";
    }

    public function moveBackward(): void
    {
        echo "Еду назад со скоростью {$this->speed} км/ч\n";
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }

    public function honk(): void
    {
        echo "Биип!\n";
    }

    public function setInterior(string $material): void
    {
        $this->interior = $material;
    }

    public function getInterior(): string
    {
        return $this->interior;
    }

    public function turnWipersOn(): void
    {
        echo "Дворники включены\n";
    }

    public function turnWipersOff(): void
    {
        echo "Дворники выключены\n";
    }
}

// Легковой автомобиль
class Car extends Vehicle
{
    public function useNitro(): void
    {
        echo "Активирована закись азота!\n";
    }
}

// Бульдозер
class Bulldozer extends Vehicle implements SpecialEquipmentInterface
{
    public function useSpecialAbility(): void
    {
        echo "Ковш движется!\n";
    }
}

// Танк
class Tank extends Vehicle
{
    public function fire(): void
    {
        echo "Танк стреляет!\n";
    }
}

// Функция для демонстрации полиморфизма
function useVehicle(VehicleInterface $vehicle)
{
    $vehicle->moveForward();
    $vehicle->setSpeed(60);
    $vehicle->moveBackward();
    $vehicle->honk();
    $vehicle->turnWipersOn();
    
    if ($vehicle instanceof SpecialEquipmentInterface) {
        $vehicle->useSpecialAbility();
    } elseif ($vehicle instanceof Car) {
        $vehicle->useNitro();
    } elseif ($vehicle instanceof Tank) {
        $vehicle->fire();
    }
    
    echo "Отделка салона: " . $vehicle->getInterior() . "\n";
}
