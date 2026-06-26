<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidentArchive extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'no_kk',
        'jenis_dokumen',
        'nomor_dokumen',
        'file_path',
        'keterangan',
    ];
}
