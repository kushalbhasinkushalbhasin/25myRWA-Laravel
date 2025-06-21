<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\IdentifyClient;

use App\Http\Controllers\HomeController;
use App\Http\Middleware\BridgeCorePhpSession;

use App\Http\Controllers\MembershipController;




Route::middleware([IdentifyClient::class, BridgeCorePhpSession::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('save-contact-us', [HomeController::class, 'saveContactUs'])->name('save_contact_us');

});

Route::get('/membership', [MembershipController::class, 'showForm'])->name('membership.form');
Route::post('/membership/submit', [MembershipController::class, 'submitForm'])->name('membership.submit');


Route::get('/{any}', function ($any) {
    $file    = ltrim($any, '/').'.php';
    $coreDir = realpath(base_path('../core'));
    $corePath = $coreDir . '/' . $file;

    if (is_file($corePath)) {
        error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

        // Avoid early output before Laravel view
        ob_start();
        chdir($coreDir);
        $_SERVER['SCRIPT_FILENAME'] = $corePath;
        $_SERVER['SCRIPT_NAME']     = '/'.$file;
        $_SERVER['REQUEST_URI']     = '/'.$any;

        include $corePath;
        $output = ob_get_clean();

        chdir(base_path());

        return response($output);
    }

    abort(404);
})->where('any', '.*');



require __DIR__ . '/auth.php';