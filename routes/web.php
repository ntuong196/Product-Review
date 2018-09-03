<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// GET PRODUCT LIST
Route::get('/', function(){
    $sql = "select * from item";
    $items = DB::select($sql);
    return view('items.item_list') -> with("items", $items);
});


// ADD PRODUCT

Route::get('/additem', function(){
    return view('items.add_item');
});

Route::post('add_item_action', function()
{
$id = request('id');    
$summary = request('summary');
$manufacturer = request('manufacturer');
$item = add_item($id, $summary, $manufacturer);
// If successfully created then display newly created item
if ($item)
{
return redirect("/item_detail/$id");
}
else
{
die("Error adding item");
}
});

// ADD PRODUCT REVIEW

Route::get('addreview/{id}', function ($id)
{
$item = get_item($id);
return view('review.add_review')->with("item", $item);
});


Route::post('add_review_action', function()
{
$id = request('id');    
$client = request('client');
$rating = request('rating');
$comment = request('comment');

$item = add_review($id, $client, $rating, $comment);
// If successfully created then display newly created item
if ($id)
{
return redirect("/item_detail/$id");
}
else
{
die("Error adding review");
}
});

// SORT BY MANUFACTURER

Route::get('/manufacturer', function(){
    $sql = "select * from item";
    $items = DB::select($sql);
    return view('branch.branch') -> with("items", $items);
});

// ITEM DETAILS & VIEW COMMENT

Route::get('item_detail/{id}', function ($id)
{
$item = get_item($id);

$reviews = get_review($id);
return view('items.item_detail', ["item"=> $item, "reviews"=> $reviews]);
});


// UPDATE PRODUCT REVIEW
Route::get('update_item/{id}', function ($id)
{
$item = get_item($id);
return view('items.update_item')->with("item", $item);
});

Route::post('update_item_action', function()
{
$id = request('id');
$summary = request('summary');
$manufacturer = request('manufacturer');
update_item($id, $summary ,$manufacturer);

if ($id)
{
// echo($review);
return redirect("/item_detail/$id");
}
else
{
die("error");
}
});

// DELETE PRODUCT

Route::get('delete_item_action/{id}', function($id)
{
delete_item($id);
return redirect("/");
});

// FUNCTION


function get_item($id)
{
$sql = "select * from item where id = ?";
$items = DB::select($sql, array($id));
// If we get more than one item or no items display an error
if (count($items) != 1)
{
die("Invalid query or result: $query\n");
}
// Extract the first item (which should be the only item)
$item = $items[0];
return $item;
}

function get_review($id)
{
$sql = "select * from review where id = ?";
$reviews = DB::select($sql, array($id));
// If we get more than one item or no items display an error

return $reviews;
}

function add_item($id, $summary, $manufactorer)
{
$sql = "insert into item (id, summary, manufacturer) values (?,?,?)";
DB::insert($sql, array($id, $summary, $manufactorer));
$id = DB::getPdo()->lastInsertId();
return $id;
}

function add_review($id, $client, $rating, $comment)
{
$sql = "insert into review (id, client, rating, comment) values (?,?,?,?)";
DB::insert($sql, array($id, $client, $rating, $comment));
$id = DB::getPdo()->lastInsertId();
return $id;
}


function update_item($id, $summary, $manufactorer) {
$sql = "update item set summary = ? , manufacturer= ? where id = ?";
DB::update($sql, array($summary, $manufactorer, $id));
}

function delete_item($id) {
$sql = "delete from item where id = ?";
$sql2 = "delete from review where id = ?";
DB::delete($sql, array($id));
DB::delete($sql2, array($id));
} 

?>