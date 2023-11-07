<?php

namespace App\Factory;

use App\Entity\Loan;
use App\Repository\LoanRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Loan>
 *
 * @method        Loan|Proxy                     create(array|callable $attributes = [])
 * @method static Loan|Proxy                     createOne(array $attributes = [])
 * @method static Loan|Proxy                     find(object|array|mixed $criteria)
 * @method static Loan|Proxy                     findOrCreate(array $attributes)
 * @method static Loan|Proxy                     first(string $sortedField = 'id')
 * @method static Loan|Proxy                     last(string $sortedField = 'id')
 * @method static Loan|Proxy                     random(array $attributes = [])
 * @method static Loan|Proxy                     randomOrCreate(array $attributes = [])
 * @method static LoanRepository|RepositoryProxy repository()
 * @method static Loan[]|Proxy[]                 all()
 * @method static Loan[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Loan[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Loan[]|Proxy[]                 findBy(array $attributes)
 * @method static Loan[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Loan[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class LoanFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        $faker = \Faker\Factory::create();
        $dateBorrowed = $faker->dateTimeBetween('-5 years', 'now');
        // Generate a random number of years to add to the birthDate
        $daysToAdd = $faker->numberBetween(1, 90);
        // Create the deathDate by adding the random number of years to the birthDate
        $dateReturned = (clone $dateBorrowed)->modify("+$daysToAdd days");
        if ($faker->optional(0.7)->randomElement([true, false])) {
            $dateReturned = null;
        }

        return [
            'dateBorrowed' => $dateBorrowed,
            'dateReturned' => $dateReturned,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Loan $loan): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Loan::class;
    }
}
