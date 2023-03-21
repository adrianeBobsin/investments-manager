<?php
 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

  public function index(Request $request)
  {
    /** @var \App\Models\User */
    $user = $request->user();

    $query = Transaction::query();

    $query->where('user_id', $user->id);

    if ($request->query('categoria')) {
      $query->where('group', $request->query('categoria'));
    }

    if ($request->query('ticker')) {
      $query->where('ticker', $request->query('ticker'));
    }

    return $query->get();
  }

  public function store(Request $request)
  {
    return Transaction::create($request->input());
  }

}