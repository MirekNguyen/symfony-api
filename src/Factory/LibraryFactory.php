<?php

namespace App\Factory;

use App\Entity\Library;
use App\Repository\LibraryRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Library>
 *
 * @method        Library|Proxy                     create(array|callable $attributes = [])
 * @method static Library|Proxy                     createOne(array $attributes = [])
 * @method static Library|Proxy                     find(object|array|mixed $criteria)
 * @method static Library|Proxy                     findOrCreate(array $attributes)
 * @method static Library|Proxy                     first(string $sortedField = 'id')
 * @method static Library|Proxy                     last(string $sortedField = 'id')
 * @method static Library|Proxy                     random(array $attributes = [])
 * @method static Library|Proxy                     randomOrCreate(array $attributes = [])
 * @method static LibraryRepository|RepositoryProxy repository()
 * @method static Library[]|Proxy[]                 all()
 * @method static Library[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Library[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Library[]|Proxy[]                 findBy(array $attributes)
 * @method static Library[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Library[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class LibraryFactory extends ModelFactory
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
        return [
            'city' => self::faker()->text(100),
            'street' => self::faker()->text(100),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Library $library): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Library::class;
    }
}
