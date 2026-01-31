<?php

class Plant extends Model
{
    protected $fillable = [
        'nama',
        'huruf',
        'kategori',   // buah / sayur
        'gambar',
        'deskripsi'
    ];
}
