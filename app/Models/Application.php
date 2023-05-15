<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'firstname', 'lastname', 'email', 'phone', 'address', 'city', 'code', 'voivodeship_id', 'iban', 'reason', 'legal_1', 'legal_2', 'legal_3', 'legal_4', 'img_receipt'];

    /**
     * @return BelongsTo
     */
    public function voivodeship(): BelongsTo
    {
        return $this->belongsTo(Voivodeship::class);
    }

    /**
     * @param $query
     * @param $search
     * @param $searchable
     * @return mixed
     */
    public function scopeSearch($query, $search, $searchable): mixed
    {
        if ($search && $searchable) {
            $query->where(function ($query) use ($search, $searchable) {
                foreach ($searchable as $column) {
                    match ($column) {
                        'id', 'firstname', 'lastname', 'email', 'phone', 'address', 'city', 'code', 'iban', 'reason',
                        'created_at' => $query->orWhere($column, 'like', '%' . $search . '%'),
                        'voivodeship.name' => $query->orWhereHas('voivodeship', function ($subQuery) use ($search) {
                            $subQuery->where('name', 'like', '%' . $search . '%');
                        }),
                        default => null,
                    };
                }
            });
        }

        return $query;
    }

    /**
     * @param $query
     * @param $filter
     * @return mixed
     */
    public function scopeFilter($query, $filter): mixed
    {
        if ($filter) {
            $filters = json_decode($filter, true);

            foreach ($filters as $column => $value) {
                match ($column) {
                    'id', 'firstname', 'lastname', 'email', 'phone', 'address', 'city', 'code',
                    'iban', 'reason', 'created_at' => $query->where($column, 'like', '%' . $value . '%'),
                    'voivodeship.name' => $query->orWhereHas('voivodeship', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    'legal_1', 'legal_2', 'legal_3', 'legal_4' => $query->where($column, '=', $value === 'TAK' ? 1 : 0),
                    default => null,
                };
            }
        }

        return $query;
    }

}
