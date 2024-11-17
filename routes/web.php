<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\NodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use App\Models\Election;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/ayam', function () {
    return view('ayam');
});

Route::get('/hello', function () {
    return view('helloworld');
});

// Route to get the greeting from Node.js
Route::get('/fetch-greeting', [GreetingController::class, 'fetchGreeting']);

// Route to set a new greeting on Node.js
Route::post('/set-greeting', [GreetingController::class, 'setGreeting']);


Route::get('/data', [NodeController::class, "getNodeData"]);

Route::get('/fetch-candidates', [ElectionController::class, "fetchCandidates"]);


Route::get('/addcandidateview', [ElectionController::class, "addCandidateView"]);
Route::post('/addcandidate', [ElectionController::class, "addCandidate"]);

Route::get('/registervoterview', [ElectionController::class, "registerVoterView"]);
Route::post('/registervoter', [ElectionController::class, "registerVoter"]);


Route::get('/voteview', [ElectionController::class, 'castVoteView']);
Route::post('/vote', [ElectionController::class, 'castVote']);
Route::get('/votestatus', [ElectionController::class, 'getVoteStatus']);

Route::get('/dashboard', [VoteController::class, "dashboard"])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/history', [VoteController::class, "electionHistory"])->middleware(['auth', 'verified'])->name('history');

Route::get('/elections', [VoteController::class, "electionIndex"])->middleware(['auth', 'verified'])->name('elections');

Route::get('/votes/{id}', [VoteController::class, "voteView"])->middleware(['auth', 'verified'])->name('votes.show');
Route::post('/votes/{id}/submit', [VoteController::class, "castVote"])->middleware(['auth', 'verified'])->name('votes.store');

// ADMIN COY
Route::middleware([
    RoleMiddleware::class . ':admin',
])->group(function () {
    Route::get('/admin/manage', [AdminController::class, "manageView"])->name('admin.manage');
    Route::post('/admin/manage', [AdminController::class, "electionPost"])->name('admin.manage.electionpost');
    Route::get('/admin/manage/{id}', [AdminController::class, "manageElectionView"])->name('admin.manage.election');
    Route::get('/admin/manage/{id}/analytics', [AdminController::class, "manageAnalyticsView"])->name('admin.manage.analytics');
    Route::post('/admin/manage/{id}', [AdminController::class, "addCandidate"])->name('admin.manage.addcandidate');
    Route::post('/admin/manage/{id}/voter', [AdminController::class, "addAllVoterId"])->name('admin.manage.addvoter');
    Route::get('/admin/manage/{id}/analytics/data', [AdminController::class, "getVoteData"])->name('admin.manage.addvoter');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
