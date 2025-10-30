<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::get('/', function () {
    $products = Session::get('products', [
        (object) ['id' => 1, 'nama' => 'Laptop', 'harga' => 7500000, 'gambar' => 'laptop.jpg'],
        (object) ['id' => 2, 'nama' => 'Mouse', 'harga' => 100000, 'gambar' => 'mouse.jpg'],
        (object) ['id' => 3, 'nama' => 'Keyboard', 'harga' => 250000, 'gambar' => 'keyboard.jpg'],
        (object) ['id' => 4, 'nama' => 'Monitor', 'harga' => 3000000, 'gambar' => 'monitor.jpg'],
        (object) ['id' => 5, 'nama' => 'Printer', 'harga' => 1500000, 'gambar' => 'printer.jpg'],
        (object) ['id' => 6, 'nama' => 'Speaker', 'harga' => 500000, 'gambar' => 'speaker.jpg'],
        (object) ['id' => 7, 'nama' => 'Webcam', 'harga' => 200000, 'gambar' => 'webcam.jpg'],
        (object) ['id' => 8, 'nama' => 'Headset', 'harga' => 400000, 'gambar' => 'headset.jpg'],
        (object) ['id' => 9, 'nama' => 'Hard Disk', 'harga' => 800000, 'gambar' => 'harddisk.jpg'],
        (object) ['id' => 10, 'nama' => 'RAM', 'harga' => 600000, 'gambar' => 'ram.jpg']
    ]);
    return view('home', compact('products'));
});

// Route User Index (10 dummy data tampil, search/per_page/pagination)
Route::get('/user', function (Request $request) {
    $users = Session::get('users', [
        (object) ['id' => 1, 'nama' => 'John Doe', 'email' => 'john@example.com'],
        (object) ['id' => 2, 'nama' => 'Jane Smith', 'email' => 'jane@example.com'],
        (object) ['id' => 3, 'nama' => 'Bob Johnson', 'email' => 'bob@example.com'],
        (object) ['id' => 4, 'nama' => 'Alice Brown', 'email' => 'alice@example.com'],
        (object) ['id' => 5, 'nama' => 'Charlie Wilson', 'email' => 'charlie@example.com'],
        (object) ['id' => 6, 'nama' => 'Diana Davis', 'email' => 'diana@example.com'],
        (object) ['id' => 7, 'nama' => 'Eve Miller', 'email' => 'eve@example.com'],
        (object) ['id' => 8, 'nama' => 'Frank Garcia', 'email' => 'frank@example.com'],
        (object) ['id' => 9, 'nama' => 'Grace Lee', 'email' => 'grace@example.com'],
        (object) ['id' => 10, 'nama' => 'Henry Taylor', 'email' => 'henry@example.com']
    ]);

    $search = $request->get('search');
    if ($search) {
        $users = collect($users)->filter(function ($u) use ($search) {
            return str_contains($u->nama, $search) || str_contains($u->email, $search);
        })->values();
    }

    $perPage = $request->get('per_page', 5);
    $currentPage = $request->get('page', 1);
    $totalItems = count($users);
    $totalPages = ceil($totalItems / $perPage);
    $startItem = ($currentPage - 1) * $perPage + 1;
    $endItem = min($currentPage * $perPage, $totalItems);
    $offset = ($currentPage - 1) * $perPage;
    $paginatedUsers = collect($users)->slice($offset, $perPage)->values();
    $users = $paginatedUsers;

    return view('user', compact('users', 'currentPage', 'totalPages', 'startItem', 'endItem', 'totalItems'));
});

// Route Tambah User
Route::get('/user/create', function () {
    return view('user-create');
});

// Route Store User
Route::post('/user', function (Request $request) {
    $users = Session::get('users', []);
    $newId = count($users) + 1;
    $newUser = (object) ['id' => $newId, 'nama' => $request->nama, 'email' => $request->email];
    $users[] = $newUser;
    Session::put('users', $users);
    return redirect('/user')->with('success', 'User ditambahkan!');
});

// Route Detail User
Route::get('/user/{id}', function ($id) {
    $users = Session::get('users', []);
    $user = collect($users)->firstWhere('id', $id);
    if ($user) {
        return view('user-detail', compact('user'));
    }
    abort(404, 'User gak ditemukan');
});

// Route Edit User
Route::get('/user/{id}/edit', function ($id) {
    $users = Session::get('users', []);
    $user = collect($users)->firstWhere('id', $id);
    if ($user) {
        return view('user-edit', compact('user'));
    }
    abort(404, 'User gak ditemukan');
});

// Route Update User
Route::put('/user/{id}', function (Request $request, $id) {
    $users = Session::get('users', []);
    $index = collect($users)->search(function ($u) use ($id) { return $u->id == $id; });
    if ($index !== false) {
        $users[$index]->nama = $request->nama;
        $users[$index]->email = $request->email;
        Session::put('users', $users);
    }
    return redirect('/user')->with('success', 'User diperbarui!');
});

// Route Hapus User
Route::delete('/user/{id}', function ($id) {
    $users = Session::get('users', []);
    $users = collect($users)->reject(function ($user) use ($id) {
        return $user->id == $id;
    })->values();
    Session::put('users', $users);
    return redirect('/user')->with('success', 'User dihapus!');
});

// Route Produk Index
Route::get('/produk', function (Request $request) {
    $products = Session::get('products', [
        (object) ['id' => 1, 'nama' => 'Laptop', 'harga' => 7500000, 'gambar' => 'laptop.jpg'],
        (object) ['id' => 2, 'nama' => 'Mouse', 'harga' => 100000, 'gambar' => 'mouse.jpg'],
        (object) ['id' => 3, 'nama' => 'Keyboard', 'harga' => 250000, 'gambar' => 'keyboard.jpg'],
        (object) ['id' => 4, 'nama' => 'Monitor', 'harga' => 3000000, 'gambar' => 'monitor.jpg'],
        (object) ['id' => 5, 'nama' => 'Printer', 'harga' => 1500000, 'gambar' => 'printer.jpg'],
        (object) ['id' => 6, 'nama' => 'Speaker', 'harga' => 500000, 'gambar' => 'speaker.jpg'],
        (object) ['id' => 7, 'nama' => 'Webcam', 'harga' => 200000, 'gambar' => 'webcam.jpg'],
        (object) ['id' => 8, 'nama' => 'Headset', 'harga' => 400000, 'gambar' => 'headset.jpg'],
        (object) ['id' => 9, 'nama' => 'Hard Disk', 'harga' => 800000, 'gambar' => 'harddisk.jpg'],
        (object) ['id' => 10, 'nama' => 'RAM', 'harga' => 600000, 'gambar' => 'ram.jpg']
    ]);

    $search = $request->get('search');
    if ($search) {
        $products = collect($products)->filter(function ($p) use ($search) {
            return str_contains($p->nama, $search);
        })->values();
    }

    $perPage = $request->get('per_page', 5);
    $currentPage = $request->get('page', 1);
    $totalItems = count($products);
    $totalPages = ceil($totalItems / $perPage);
    $startItem = ($currentPage - 1) * $perPage + 1;
    $endItem = min($currentPage * $perPage, $totalItems);
    $offset = ($currentPage - 1) * $perPage;
    $paginatedProducts = collect($products)->slice($offset, $perPage)->values();
    $products = $paginatedProducts;

    return view('produk', compact('products', 'currentPage', 'totalPages', 'startItem', 'endItem', 'totalItems'));
});

// Route Tambah Produk
Route::get('/produk/create', function () {
    return view('produk-create');
});

// Route Store Produk
Route::post('/produk', function (Request $request) {
    $products = Session::get('products', []);
    $newId = count($products) + 1;
    $newProduct = (object) ['id' => $newId, 'nama' => $request->nama, 'harga' => $request->harga, 'gambar' => $request->gambar ?? 'default.jpg'];
    $products[] = $newProduct;
    Session::put('products', $products);
    return redirect('/produk')->with('success', 'Produk ditambahkan!');
});

// Route Detail Produk
Route::get('/produk/{id}', function ($id) {
    $products = Session::get('products', []);
    $product = collect($products)->firstWhere('id', $id);
    if ($product) {
        return view('produk-detail', compact('product'));
    }
    abort(404, 'Produk gak ditemukan');
});

// Route Edit Produk
Route::get('/produk/{id}/edit', function ($id) {
    $products = Session::get('products', []);
    $product = collect($products)->firstWhere('id', $id);
    if ($product) {
        return view('produk-edit', compact('product'));
    }
    abort(404, 'Produk gak ditemukan');
});

// Route Update Produk
Route::put('/produk/{id}', function (Request $request, $id) {
    $products = Session::get('products', []);
    $index = collect($products)->search(function ($p) use ($id) { return $p->id == $id; });
    if ($index !== false) {
        $products[$index]->nama = $request->nama;
        $products[$index]->harga = $request->harga;
        $products[$index]->gambar = $request->gambar ?? $products[$index]->gambar;
    }
    Session::put('products', $products);
    return redirect('/produk')->with('success', 'Produk diperbarui!');
});

// Route Hapus Produk
Route::delete('/produk/{id}', function ($id) {
    $products = Session::get('products', []);
    $products = collect($products)->reject(function ($product) use ($id) {
        return $product->id == $id;
    })->values();
    Session::put('products', $products);
    return redirect('/produk')->with('success', 'Produk dihapus!');
});

// Route Distributor Index
Route::get('/distributor', function (Request $request) {
    $distributors = Session::get('distributors', [
        (object) ['id' => 1, 'nama' => 'PT Elektronik Jaya', 'alamat' => 'Jl. Merdeka No. 10'],
        (object) ['id' => 2, 'nama' => 'CV Sumber Makmur', 'alamat' => 'Jl. Raya Barat No. 25'],
        (object) ['id' => 3, 'nama' => 'Toko Abadi', 'alamat' => 'Jl. Sudirman No. 50'],
        (object) ['id' => 4, 'nama' => 'UD Mitra Sejahtera', 'alamat' => 'Jl. Gatot Subroto No. 15'],
        (object) ['id' => 5, 'nama' => 'PT Global Tech', 'alamat' => 'Jl. Thamrin No. 8'],
        (object) ['id' => 6, 'nama' => 'CV Prima Jaya', 'alamat' => 'Jl. Sudaco No. 12'],
        (object) ['id' => 7, 'nama' => 'Toko Elektronik Modern', 'alamat' => 'Jl. Raya Pos No. 20'],
        (object) ['id' => 8, 'nama' => 'PT Sumber Rezeki', 'alamat' => 'Jl. Ahmad Yani No. 5'],
        (object) ['id' => 9, 'nama' => 'UD Barokah Abadi', 'alamat' => 'Jl. Veteran No. 3'],
        (object) ['id' => 10, 'nama' => 'CV Andalan Jaya', 'alamat' => 'Jl. Diponegoro No. 7']
    ]);

    $search = $request->get('search');
    if ($search) {
        $distributors = collect($distributors)->filter(function ($d) use ($search) {
            return str_contains($d->nama, $search) || str_contains($d->alamat, $search);
        })->values();
    }

    $perPage = $request->get('per_page', 5);
    $currentPage = $request->get('page', 1);
    $totalItems = count($distributors);
    $totalPages = ceil($totalItems / $perPage);
    $startItem = ($currentPage - 1) * $perPage + 1;
    $endItem = min($currentPage * $perPage, $totalItems);
    $offset = ($currentPage - 1) * $perPage;
    $paginatedDistributors = collect($distributors)->slice($offset, $perPage)->values();
    $distributors = $paginatedDistributors;

    return view('distributor', compact('distributors', 'currentPage', 'totalPages', 'startItem', 'endItem', 'totalItems'));
});

// Route Tambah Distributor
Route::get('/distributor/create', function () {
    return view('distributor-create');
});

// Route Store Distributor
Route::post('/distributor', function (Request $request) {
    $distributors = Session::get('distributors', []);
    $newId = count($distributors) + 1;
    $newDistributor = (object) ['id' => $newId, 'nama' => $request->nama, 'alamat' => $request->alamat];
    $distributors[] = $newDistributor;
    Session::put('distributors', $distributors);
    return redirect('/distributor')->with('success', 'Distributor ditambahkan!');
});

// Route Detail Distributor (exact URL /distributor/{id})
Route::get('/distributor/{id}', function ($id) {
    $distributors = Session::get('distributors', []);
    $distributor = collect($distributors)->firstWhere('id', $id);
    if ($distributor) {
        return view('distributor-detail', compact('distributor'));
    }
    abort(404, 'Distributor gak ditemukan');
});

// Route Edit Distributor (exact URL /distributor/{id}/edit)
Route::get('/distributor/{id}/edit', function ($id) {
    $distributors = Session::get('distributors', []);
    $distributor = collect($distributors)->firstWhere('id', $id);
    if ($distributor) {
        return view('distributor-edit', compact('distributor'));
    }
    abort(404, 'Distributor gak ditemukan');
});

// Route Update Distributor
Route::put('/distributor/{id}', function (Request $request, $id) {
    $distributors = Session::get('distributors', []);
    $index = collect($distributors)->search(function ($d) use ($id) { return $d->id == $id; });
    if ($index !== false) {
        $distributors[$index]->nama = $request->nama;
        $distributors[$index]->alamat = $request->alamat;
        Session::put('distributors', $distributors);
    }
    return redirect('/distributor')->with('success', 'Distributor diperbarui!');
});

// Route Hapus Distributor
Route::delete('/distributor/{id}', function ($id) {
    $distributors = Session::get('distributors', []);
    $distributors = collect($distributors)->reject(function ($distributor) use ($id) {
        return $distributor->id == $id;
    })->values();
    Session::put('distributors', $distributors);
    return redirect('/distributor')->with('success', 'Distributor dihapus!');
});