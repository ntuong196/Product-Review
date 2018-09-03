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
    $sql = "select * from item";
    $items = DB::select($sql);
    return view('items.add_item') -> with("items", $items);
});

Route::post('add_item_action', function()
{
$id = request('id');    
$summary = request('summary');
$review = request('review');
$manufacturer = request('manufacturer');
$item = add_item($id, $summary, $manufacturer, $review);
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

// SORT BY MANUFACTURER

Route::get('/manufacturer', function(){
    $sql = "select * from item";
    $items = DB::select($sql);
    return view('branch.branch') -> with("items", $items);
});

Route::get('item_detail/{id}', function ($id)
{
$item = get_item($id);
return view('items.item_detail')->with("item", $item);
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
$review = request('review');
update_item($id, $review);

if ($review)
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

function add_item($id, $summary, $manufactorer, $review)
{
$sql = "insert into item (id, summary, manufacturer, review) values (?,?,?, ?)";
DB::insert($sql, array($id, $summary, $manufactorer, $review));
$id = DB::getPdo()->lastInsertId();
return $id;
}


function update_item($id, $review) {
$sql = "update item set review = ? where id = ?";
DB::update($sql, array($review, $id));
}

function delete_item($id) {
$sql = "delete from item where id = ?";
DB::delete($sql, array($id));
} 

?>