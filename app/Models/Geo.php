<?php

namespace App\Models;

use App\Indexes\GeoIndex;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use ScoutElastic\Searchable;

class Geo extends \Igaster\LaravelCities\Geo
{
    use HasFactory, Searchable;

    protected string $indexConfigurator = GeoIndex::class;

    /**
     * Extending Laravel Cities to include all feature codes
     * Source: https://www.geonames.org/export/codes.html
     */
    const LEVEL_ADM1    = 'ADM1';     // first-order administrative division	a primary administrative division of a country, such as a state in the United States
    const LEVEL_ADM1H   = 'ADM1H';    // historical first-order administrative division	a former first-order administrative division
    const LEVEL_ADM2    = 'ADM2';     // second-order administrative division	a subdivision of a first-order administrative division
    const LEVEL_ADM2H   = 'ADM2H';    // historical second-order administrative division	a former second-order administrative division
    const LEVEL_ADM3    = 'ADM3';     // third-order administrative division	a subdivision of a second-order administrative division
    const LEVEL_ADM3H   = 'ADM3H';    // historical third-order administrative division	a former third-order administrative division
    const LEVEL_ADM4    = 'ADM4';     // fourth-order administrative division	a subdivision of a third-order administrative division
    const LEVEL_ADM4H   = 'ADM4H';    // historical fourth-order administrative division	a former fourth-order administrative division
    const LEVEL_ADM5    = 'ADM5';     // fifth-order administrative division	a subdivision of a fourth-order administrative division
    const LEVEL_ADM5H   = 'ADM5H';    // historical fifth-order administrative division	a former fifth-order administrative division
    const LEVEL_ADMD    = 'ADMD';     // administrative division	an administrative division of a country, undifferentiated as to administrative level
    const LEVEL_ADMDH   = 'ADMDH';    // historical administrative division 	a former administrative division of a political entity, undifferentiated as to administrative level
    const LEVEL_LTER    = 'LTER';     // leased area	a tract of land leased to another country, usually for military installations
    const LEVEL_PCL     = 'PCL';      // political entity
    const LEVEL_PPLC    = 'PPLC';      // political capitol entity
    const LEVEL_PCLD    = 'PCLD';     // dependent political entity
    const LEVEL_PCLF    = 'PCLF';     // freely associated state
    const LEVEL_PCLH    = 'PCLH';     // historical political entity	a former political entity
    const LEVEL_PCLI    = 'PCLI';     // independent political entity
    const LEVEL_PCLIX   = 'PCLIX';    // section of independent political entity
    const LEVEL_PCLS    = 'PCLS';     // semi-independent political entity
    const LEVEL_PRSH    = 'PRSH';     // parish	an ecclesiastical district
    const LEVEL_TERR    = 'TERR';     // territory
    const LEVEL_ZN      = 'ZN';       // zone
    const LEVEL_ZNB     = 'ZNB';      // buffer zone	a zone recognized as a buffer between two nations in which military presence is minimal or absent

    /**
     * Levels array
     */
    const LEVELS_ARRAY = [
        self::LEVEL_ADM1,
        self::LEVEL_ADM1H,
        self::LEVEL_ADM2,
        self::LEVEL_ADM2H,
        self::LEVEL_ADM3,
        self::LEVEL_ADM3H,
        self::LEVEL_ADM4,
        self::LEVEL_ADM4H,
        self::LEVEL_ADM5,
        self::LEVEL_ADM5H,
        self::LEVEL_ADMD,
        self::LEVEL_ADMDH,
        self::LEVEL_LTER,
        self::LEVEL_PCL,
        self::LEVEL_PCLD,
        self::LEVEL_PCLF,
        self::LEVEL_PCLH,
        self::LEVEL_PCLI,
        self::LEVEL_PCLIX,
        self::LEVEL_PCLS,
        self::LEVEL_PRSH,
        self::LEVEL_TERR,
        self::LEVEL_ZN,
        self::LEVEL_ZNB,
    ];

    /**
     * Clean entity name of any redundant titles
     *
     * @param string $value
     * @return string
     */
    public function getNameAttribute(string $value): string
    {
        $wordList = array(
            'Changwat',
            'Province',
            'Phra Nakhon Si',
            'Amphoe Mueang',
            'Amphoe',
            'Mueang'
        );
        if (Str::of($value)->contains($wordList)) {
            return trim(preg_replace('/'.implode('|', $wordList).'/i', '', $value));
        }
        return $value;
    }

    /**
     * Scope a query to only include cities.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeCities(Builder $query): Builder
    {
        return $query->where('level', Geo::LEVEL_ADM1);
    }

    /**
     * Prepare model data for ElasticSearch indexing
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return $this->toArray();
    }

    /**
     * ElasticSearch mapping of model
     *
     * @return array
     */
    protected array $mapping = [
        'properties' => [
            'name' => [
                'type' => 'text',
                'analyzer' => 'autocomplete',
                'search_analyzer' => 'autocomplete',
                'fields' => [
                    'raw' => [
                        'type' => 'keyword'
                    ],
                ],
            ],
        ]
    ];
}
