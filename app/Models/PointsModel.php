<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PointsModel extends Model
{
    protected $table = 'points';
    protected $guarded = ['id'];

    public function geojson_points()
    {
        // Ambil data dari database
        $points = $this
            ->select(DB::raw('points.id, st_asgeojson(points.geom) as geom, points.name, points.address, points.image, points.description, points.created_at, points.updated_at, points.user_id, users.name as user_created'))
            ->leftJoin('users', 'points.user_id', '=', 'users.id')
            ->get();

        // Bangun struktur GeoJSON
        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($points as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'image' => $p->image,
                    'address' => $p->address,
                    'description' => $p->description,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'user_created' => $p->user_created,
                    'user_id' => $p->user_id,
                ],
            ];

            ($geojson['features'][] = $feature);
        }


        // Kembalikan GeoJSON
        return $geojson;
    }

    public function geojson_point($id) //mengambil data dari database dan mengubahnya menjadi geojson
    {
        $points = $this
            ->select(DB::raw('id, st_asgeojson(geom) as geom, name, address,
            description, image, created_at, updated_at'))
            ->where('id', $id)
            ->get(); //mengambil data dari database

        $geojson = [
            'type' => 'FeatureCollection', //mengubah data menjadi geojson
            'features' => [],
        ];

        foreach ($points as $p) { //mengambil data dari database
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom), //mengubah data menjadi geojson
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'address' => $p->address,
                    'description' => $p->description,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'image' => $p->image,
                ],
            ];

            array_push($geojson['features'], $feature); //menambahkan data ke dalam array
        }

        // Kembalikan GeoJSON
        return $geojson;
    }
}
