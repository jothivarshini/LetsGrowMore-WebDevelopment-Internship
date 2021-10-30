<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class Batch extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'batch';

    protected $fillable = [
        'name',
    ];

    public function getBatches() {
        return Batch::all();
    }

    public function findById($id) {

        return Batch::where('id', $id)->first();
    }

    public function create($data) {
        return Batch::insert(
            array($data)
        );
    }

    public function updateDetail( array $data, $id) {

        return  Batch::where('id', $id)->update(
            [
                'name' => $data['name'],
            ]
        );
    }

    public function deleteById($id) {

        return DB::table('batch')->where('id', $id)->delete();

    }
}
