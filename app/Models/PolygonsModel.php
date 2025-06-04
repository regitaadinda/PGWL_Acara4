<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PolygonsModel extends Model
{
    protected $table = 'polygons';
    protected $guarded = ['id'];

    public function geojson_polygons()
    {
        // Ambil data dari database
        $polygons = $this
        ->select(columns: DB::raw('polygons.id, st_asgeojson(polygons.geom) as geom, polygons.name, polygons.image, polygons.description, st_area(polygons.geom, true) as luas_m2,
        st_area (polygons.geom, true)/1000000 as luas_km2, st_area(polygons.geom, true)/10000 as luas_hektar, polygons.created_at, polygons.updated_at, polygons.user_id, users.name as user_created'))
        ->leftJoin('users', 'polygons.user_id', '=', 'users.id')
        ->get();

        // Bangun struktur GeoJSON
        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polygons as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id'=> $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'luas_m2' => $p->luas_m2,
                    'luas_km2' => $p->luas_km2,
                    'luas_hektar' => $p->luas_hektar,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'image' => $p->image,
                    'user_created' => $p->user_created,
                    'user_id' => $p->user_id,
                ],
            ];

            array_push($geojson['features'], $feature);
        }

          // Kembalikan GeoJSON
          return $geojson;
        }

    public function geojson_polygon($id)
    {
        $polygons = $this
        ->select(columns: DB::raw('id, st_asgeojson(geom) as geom, name, image, description, st_area(geom, true) as luas_m2,
        st_area (geom, true)/1000000 as luas_km2, st_area(geom, true)/10000 as luas_hektar, created_at, updated_at'))
        ->where('id' , $id)
        ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polygons as $p) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'luas_m2' => $p->luas_m2,
                    'luas_km2' => $p->luas_km2,
                    'luas_hektar' => $p->luas_hektar,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'image' => $p->image,
                ],
            ];

            array_push($geojson['features'], $feature);
        }


        // Kembalikan GeoJSON
        return $geojson;
    }
}
