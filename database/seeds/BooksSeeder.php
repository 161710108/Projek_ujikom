<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;
use App\Borrowlog;
use App\User;
class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Sample penulis
        $author1 = Author::create(['name' => 'Andrea Hirata', 
                                   'tanggal_lahir'=> '1967-10-24',
                                   'pendidikan'=> ' Universitas Sheffield Hallam',
                                   'pekerjaan'=> 'Penulis']);

        $author2 = Author::create(['name' => 'Raditya Dika', 
                                   'tanggal_lahir'=> '1984-12-28',
                                   'pendidikan'=> 'Fakultas Ilmu Sosial dan Ilmu Politik Universitas Indonesia',
                                   'pekerjaan'=> 'Penulis, Komedian, Aktor, Sutradara, Youtuber']);

        // $author3 = Author::create(['name' => 'Khrisna Pabichara', 
        //                            'tanggal_lahir'=> '1975-11-10',
        //                            'pendidikan'=> 'SMA Muhammadiyah Sungguminasa',
        //                            'pekerjaan '=>'Penulis']);

        $author4 = Author::create(['name' => 'Dewi Lestari', 
                                   'tanggal_lahir'=> '1976-01-20',
                                   'pendidikan'=> ' Universitas Parahyangan',
                                   'pekerjaan'=> 'Vokalis,penulis']);
        // Sample buku
        $book1 = Book::create([
            'title' => 'Kupinang Engkau dengan Hamdalah',
            'amount' => 3, 'author_id' => $author1->id, 'book_type' => 'novel', 'tahun_terbit' => '2017','penerbit'=> 'Mitra Pustaka'
        ]);
        $book2 = Book::create([
            'title' => 'Koala Kumal',
            'amount' => 2, 'author_id' => $author2->id, 'book_type' => 'novel', 'tahun_terbit' => '2015','penerbit'=> 'GagasMedia'
        ]);
        // $book3 = Book::create([
        //     'title' => 'Sepatu Dahlan',
        //     'amount' => 4, 'author_id' => $author3->id, 'book_type' => 'novel', 'tahun_terbit' => '2012','penerbit'=> 'Noura Books'
        // ]);
        // $book4 = Book::create([
        //     'title' => 'Perahu Kertas',
        //     'amount' => 3, 'author_id' => $author3->id, 'book_type' => 'novel', 'tahun_terbit' => '2009','penerbit'=> 'Bentang Pustaka'
        // ]);

        // Sample peminjaman buku
        $member = User::where('email', 'member@gmail.com')->first();
        Borrowlog::create(['user_id' => $member->id, 'book_id'=>$book1->id, 'is_returned' => 0, 'denda' => 1000]);
        Borrowlog::create(['user_id' => $member->id, 'book_id'=>$book2->id, 'is_returned' => 0, 'denda' => 1000]);
        // Borrowlog::create(['user_id' => $member->id, 'book_id'=>$book3->id, 'is_returned' => 1, 'denda' => 1000]);
    }
}
