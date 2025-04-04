<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Public function showAdminDashboard(){
    //     $pendingTransactions = Transactions::where('status', 'pending')->get(); // Ambil data jika perlu
    //     $transactions = Transactions::with(['product', 'user'])->get();
    //     $totalTransactions = $transactions->count();
    //     $totalTransactionstable = Transactions::with(['product', 'user'])
    //                             ->where('status', '!=', 'paid') // Filter transaksi yang tidak berstatus "Paid"
    //                             ->latest() // Urutkan berdasarkan yang terbaru
    //                             ->take(5)// Ambil 5 data saja
    //                             ->get();
    //     return view('admin.dashboard', [
    //     'pendingTransactions' => $pendingTransactions,
    //     'transactions' => $transactions,
    //     'total'=> $totalTransactions,
    //     'totalTransactionstable' => $totalTransactionstable
    // ]);
    // }
    public function showAdminDashboard(){
        $pendingTransactions = Transactions::where('status', 'pending')->get(); // Ambil data jika perlu
        $transactions = Transactions::with(['product', 'user'])->get();
        $totalTransactions = $transactions->count();

        // Ambil 5 transaksi terbaru berdasarkan updated_at
        $totalTransactionstable = Transactions::with(['product', 'user'])
                                    ->where('status', '!=', 'paid')
                                    ->orderBy('updated_at', 'desc')
                                    ->take(5)
                                    ->get();

        // PIE CHART: Hitung jumlah transaksi per produk
        $transactionsPerProduct = Product::withCount('transactions')->get();
        $chartData = [
            'labels' => $transactionsPerProduct->pluck('name'),
            'data' => $transactionsPerProduct->pluck('transactions_count'),
        ];
        $transactionStats = Transactions::selectRaw('status, COUNT(*) as total')
                            ->groupBy('status')
                            ->pluck('total', 'status');

        return view('admin.dashboard', [
            'pendingTransactions' => $pendingTransactions,
            'transactions' => $transactions,
            'total'=> $totalTransactions,
            'totalTransactionstable' => $totalTransactionstable,
            'chartData' => $chartData,
            'transactionStats' => $transactionStats
        ]);
    }
    public function index()
    {
        $products = Product::all(); // Get all products
        $categories = Category::all();
        return view('user.products.index')
        ->with('products', $products)
        ->with('categories', $categories);
    }

    public function productAdmin()
    {
        return view('admin.product');
    }

    public function transaction()
    {
        return view('admin.transaction');
    }

    public function notificationTransaction()
    {
        $pendingTransactions = Transactions::where('status', 'pending')->get();

        return view('admin.dashboard', [
            'pendingTransactions' => $pendingTransactions
        ]);
    }

    public function paymentTransaction()
    {
        return view('payment.mindtrans');
    }


}