<?php

return [
    'title'=> 'Judul wajib diisi',
    'first_name-required'=>'first_name-required',
     'last_name-required'=>'last_name-required',
     'name-min'=>'Panjang nama minimal harus 3 karakter',
     'name-required' => 'nama harus diisi',
     'phone-required'=>'nomor ponsel diperlukan',
     'phone-unique'=>'Nomor telepon sudah digunakan',
     'phone-invalid' => 'Nomor telepon salah',
     'email-unique'=>'Email ini sudah digunakan',
     'phone-min' => 'Jumlah minimum nomor telepon adalah 9 digit',
     "code-required" => "Kode verifikasi diperlukan",
     "code-integer" => "Kode verifikasi harus bilangan bulat",
     "verification-code-length" => "Panjang kode verifikasi harus 4 digit",
     'country_id-required'=>'negara diperlukan',
     'area_id-required'=> 'Area diperlukan',
     'city_id-required'=> 'Kota wajib diisi',
     'international_city-required' => 'Kota yang dibutuhkan',
     'category-required' => 'Kategori diperlukan',
     'title-min' => 'Judul harus lebih dari 3 karakter',
     'invalid_type' => 'Jenis keluhan tidak valid',
     'title-required' => 'perlu judul',
     'description-required'=> 'deskripsi diperlukan',
     'type-required'=> 'type-required',
     'product-required' => 'Tidak ada produk yang dipilih',
     'quantity-required' => 'Jumlah yang dibutuhkan',
     'persyaratan tarif' => 'persyaratan tarif',
     'wajib-komentar' => 'perlu komentar',
     'some_field_missing' => 'beberapa bidang diperlukan',
     'extra-size-file' => 'Ukuran berkas harus kurang dari 25 MB',
     'phone-not-valid' => 'Nomor telepon tidak valid',
     'wrong_password' => 'kata sandi salah',


    /*
    |--------------------------------------------------------------------------
    | Original Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Original Phrases in laravel
    |
    */
    'accepted' => 'Atribut harus diterima.',
     'active_url' => ': Atribut bukan URL yang valid.',
     // 'after' => ':Attribute harus berupa tanggal setelah :date.',
     'after' => ' :attribute harus berupa tanggal yang valid.',
     'after_or_equal' => ':Attribute harus berupa tanggal setelah atau sama dengan :date.',
     'alpha' => 'Isian :attribute hanya boleh berisi karakter saja.',
     'alpha_dash' => 'Isian :attribute hanya boleh berisi huruf, angka, tanda pisah, dan garis bawah.',
     'alpha_num' => 'Isian :attribute hanya boleh berisi huruf dan angka.',
     'array' => 'Isian :attribute harus berupa larik.',
     'before' => 'Isian :attribute harus berupa tanggal sebelum :date.',
     'before_or_equal' => ':Attribute harus tanggal sebelum atau sama dengan :date.',
     "between" => [
        'numeric' => 'Isian :attribute harus antara :min dan :max.',
        'file' => 'Isian :attribute harus antara :min dan :max KB.',
        'string' => 'Isian :attribute harus antara :min dan :max karakter.',
        'array' => 'Isian :attribute harus berisi antara :min dan :max item.',
    ] ,
    'boolean' => 'Bidang atribut harus benar atau salah.',
    'confirmed' => 'Konfirmasi atribut tidak cocok.',
    'date' => ' :attribute bukan tanggal yang valid.',
    'date_equals' => ':Attribute harus merupakan tanggal yang sama dengan :date.',
    'date_format' => ': Atribut tidak cocok dengan :format.',
    'different' => 'Isian :attribute dan :other harus berbeda.',
    'digits' => ':Attribute: digits harus digit.',
    'digits_between' => ' :attribute harus antara :min dan :max digit.',
    'dimensions' => ': Atribut memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Bidang atribut berisi nilai rangkap.',
    'email' => 'Isian :attribute harus berupa alamat surel yang valid.',
    'end_with' => ': Atribut harus diakhiri dengan salah satu dari berikut: nilai.',
    'exists' => ':atribut tidak ada.',
    'file' => 'Isian :attribute harus berupa berkas.',
    'filled' => 'Bidang atribut harus berisi nilai.',
    'gt' => [
        'numeric' => 'Isian :attribute harus lebih besar dari: nilai.',
        'file' => 'Atribut :attribute harus lebih besar dari: nilai KB.',
        'string' => ':Attribute harus lebih besar dari karakter : value.',
        'array' => 'Isian :attribute harus berisi lebih dari: item nilai.',
    ] ,
    'gte' => [
        'numeric' => 'Isian :attribute harus lebih besar atau sama dengan: nilai.',
        'file' => 'Isian :attribute harus lebih besar atau sama dengan: nilai KB.',
        'string' => 'Isian :attribute harus lebih besar atau sama dengan: karakter nilai.',
        'array' => 'Isian :attribute harus mengandung: satu atau lebih item nilai.',
    ] ,
    'image' => 'Isian :attribute harus berupa gambar.',
    'in' => 'Yang ditentukan: Atribut tidak valid.',
    'in_array' => 'Kolom :attribute tidak ada di: lainnya.',
    'integer' => 'Isian :attribute harus bilangan bulat.',
    'ip' => 'Isian :attribute harus berupa alamat IP yang valid.',
    'ipv4' => 'Isian :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => 'Isian :attribute harus berupa alamat IPv6 yang valid.',
    'json' => 'Isian :attribute harus berupa string JSON yang valid.',
    'itu' => [
        'numeric' => 'Isian :attribute harus kurang dari: nilai.',
        'file' => 'Ukuran atribut: harus kurang dari: nilai kb.',
        'string' => ':Attribute harus lebih kecil dari karakter : value.',
        'array' => 'Isian :attribute harus berisi kurang dari: item nilai.',
    ] ,
    'lte' => [
        'numeric' => 'Isian :attribute harus kurang dari atau sama dengan: nilai.',
        'file' => 'Isian :attribute harus kurang dari atau sama dengan: nilai KB.',
        'string' => 'Isian :attribute harus kurang dari atau sama dengan: karakter nilai.',
        'array' => 'Isian :attribute tidak boleh berisi lebih dari: item nilai.',
    ] ,
    "max" => [
        'numeric' => ' :attribute tidak boleh lebih besar dari :max.',
        'file' => ':Attribute tidak boleh lebih besar dari:max KB.',
        'string' => 'Isian :attribute tidak boleh lebih dari :max karakter.',
        'array' => 'Isian :attribute tidak boleh berisi lebih dari: max elemen.',
    ] ,
    'mimes' => 'Isian :attribute harus berupa berkas dengan tipe yang diminta.',
    'mimetypes' => ':Attribute harus berupa berkas bertipe::values.',
    'min' => [
        'numeric' => 'Isian :attribute harus sama dengan atau lebih besar dari :min.',
        'file' => 'Isian :attribute minimal harus :min KB',
        'string' => 'Isian :attribute minimal harus sepanjang :min karakter/karakter',
        'array' => 'Bidang :attribute harus memuat setidaknya :min item',
    ],
    'not_in' => ':Attribute yang ditentukan tidak valid.',
    'not_regex' => 'Format :attribute tidak valid.',
    'numeric' => 'Isian :attribute harus berupa angka.',
    'password' => 'Kata sandi salah.',
    'present' => 'Bidang :attribute harus ada.',
    'regex' => 'Format :attribute tidak valid.',
    'required' => ':attribute is required.',
    'required_if' => 'Bidang :attribute diperlukan saat :other :value',
    'required_unless' => 'Isi :attribute diperlukan kecuali :nilai lain adalah :nilai.',
    'required_with' => 'Bidang :attribute diperlukan ketika :values ​​​​ada.',
    'required_with_all' => 'Bidang :attribute diperlukan ketika :values ​​​​ada.',
    'required_without' => 'Bidang :attributes wajib diisi jika :values ​​​​tidak ada.',
    'required_without_all' => 'Isi :attribute wajib diisi jika :values ​​tidak ada.',
    'same' => ':attribute dan :other harus sama',
    "size" => [
        'numerik' => 'Harus: atribut: ukuran.',
        'file' => 'Harus: atribut: ukuran dalam kilobita.',
        'string' => 'Harus: atribut: ukuran karakter.',
        'array' => 'Atribut: harus mengandung: item ukuran.',
    ] ,
    'begin_with' => ': Atribut harus dimulai dengan salah satu dari berikut: nilai.',
    'string' => 'Atribut: harus berupa string.',
    'timezone' => 'Atribut: harus berupa zona waktu yang valid.',
    'unique' => 'Nilai kolom :attribute sudah digunakan',
    'uploaded' => 'Gagal mengunggah: atribut.',
    'url' => 'Format atribut salah.',
    'uuid' => ': atribut harus berupa UUID yang valid.',

                'attributes' => [
                    'username'              => 'nama belakang',
                    'name'                  => 'nama belakang',
                    'email'                 => 'Surel',
                    'subject'               => 'alamat',
                    'first_name'            => 'nama',
                    'last_name'             => 'nama keluarga',
                    'password'              => 'kata sandi',
                    'password_confirmation' => 'konfirmasi sandi',
                    'country'               => 'Negara',
                    'area'                  => 'Wilayah',
                    'city'                  => 'Kota',
                    'address'               => 'alamat',
                    'phone'                 => 'teleponnya',
                    'mobile'                => 'telepon selular',
                    'age'                   => 'usia',
                    'sex'                   => 'seks',
                    'gender'                => 'Jenis',
                    'day'                   => 'Hari ini',
                    'month'                 => 'bulan',
                    'year'                  => 'tahun',
                    'hour'                  => 'jam',
                    'minute'                => 'menit',
                    'second'                => 'Kedua',
                    'content'               => 'Isi',
                    'description'           => 'deskripsi',
                    'excerpt'               => 'Ringkasan',
                    'date'                  => 'tanggal',
                    'time'                  =>'waktu',
                    'available'             =>'tersedia',
                    'size'                  => 'ukuran',
                    'price'                 => 'harga',
                    'desc'                  => 'Singkat',
                    'title'                 => 'alamat',
                    'q'                     => 'mencari',
                    'link'                  => ' ',
                    'slug'                  => ' ',
                    'country_id'            => 'Pilih negara',
                    'area_id'               => 'Pilih wilayah',
                    'city_id'               => 'pilih kota',
                    'offer_type'            => 'tipe tampilan',,
                    'condition_operation'   => 'kondisi operasi',
                    'condition_type'        => 'tipe kondisi',
                    'condition'             => 'kondisi',
                    'expire_date'           => 'Tanggal habis tempo.',
                    'code'                  => 'kode',
                    'image'                 => 'gambar',
                    'icon'                  => 'ikon',
                    'message'               => 'Isi pesan',
                    'bank_num'              => 'Nomor rekening bank',
                    'ipan'                  => 'nomor iban',
                    'old_password'          => 'password lama',
                    'certificate_file'      => 'berkas sertifikat',
                    'crd'                   => 'tanggal pendaftaran komersial',
                    'vendor_id'             => 'nama toko',
                    'role_id'               => 'peran pengguna',

                    'name' => [
                        'ar'=>'Nama Arab',
                        'gr'=>'nama Jerman',
                        'fr'=>'nama Perancis',
                        'id'=>'nama Indonesia',
                        'en'=>'nama inggris',
                    ],
                    'title'=>[
                        'ar'=>'Judul bahasa Arab',
                        'gr'=>'Alamat Jerman',
                        'fr'=>'Alamat Prancis',
                        'id'=>'alamat Indonesia',
                        'en'=>'judul bahasa inggris',
                    ],

                    'paragraph'=>[
                        'ar'=>'Deskripsi Bahasa Arab',
                        'gr'=>'Deskripsi Jerman',
                        'fr'=>'Deskripsi Perancis',
                        'id'=>'deskripsi bahasa Indonesia',
                        'en'=>'deskripsi bahasa inggris',
                    ],

                    'disc'=>[
                        'ar'=>'Deskripsi Bahasa Arab',
                        'gr'=>'Deskripsi Jerman',
                        'fr'=>'Deskripsi Perancis',
                        'id'=>'deskripsi bahasa Indonesia',
                        'en'=>' deskripsi bahasa inggris',
                    ],

                    'question' => [
                        'ar'=>'FAQ Bahasa Arab',
                        'gr'=>'FAQ Jerman',
                        'fr'=>'FAQ Prancis',
                        'id'=>'FAQ Bahasa Indonesia',
                        'en'=>'FAQ Bahasa Inggris',
                    ],

                    'answer'=>[
                        'ar'=>'Jawaban untuk pertanyaan umum bahasa Arab',
                        'gr'=>'Jawaban untuk FAQ bahasa Jerman',
                        'fr'=>'Jawaban untuk pertanyaan umum bahasa Prancis',
                        'id'=>'Jawaban untuk pertanyaan umum bahasa Indonesia',
                        'en'=>'Jawaban untuk pertanyaan umum bahasa Inggris',
                    ],

                    'short_desc'=>[
                        'ar'=>'Deskripsi singkat bahasa Arab',
                        'gr'=>'Deskripsi Singkat Jerman',
                        'fr'=>'deskripsi singkat Perancis',
                        'id'=>'deskripsi singkat bahasa Indonesia',
                        'en'=>'deskripsi singkat bahasa inggris',
                    ],

                    'body'=>[
                        'ar'=>'Deskripsi Bahasa Arab',
                        'gr'=>'Deskripsi Jerman',
                        'fr'=>'Deskripsi Perancis',
                        'id'=>'deskripsi bahasa Indonesia',
                        'en'=>'deskripsi bahasa inggris',
                
                ],
        ],
];
