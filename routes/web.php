<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\unitController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\stationPumpcontroller;
use App\Http\Controllers\FertilizeController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
    // echo phpinfo();
});
Route::post('RegUser',[userController::class, 'costumerReg'])->name('RegUser');
Route::get('RegUserform',[userController::class, 'reguserform'])->name('RegUserform');
Route::get('regFarm/{id_ajax}', [unitController::class, 'regFarm'])->name('regFarm');
Route::post('regUnitDetails', [unitController::class, 'regUnitDetails'])->name('regUnitDetails');
Route::post('RegFarmOfUser', [unitController::class, 'RegFarmOfUser'])->name('RegFarmOfUser');
Route::get('regUnitforFarm/{id_farm}', [unitController::class, 'regUnitforFarm'])->name('regUnitforFarm');
// pomp functions
Route::get('RegPompform', [settingsController::class, 'RegPompform'])->name('RegPompform');


//RegIrrigationform functions
Route::get('RegIrrigationform',[settingsController::class,'RegIrrigationform'])->name('RegIrrigationform');
Route::get('regFarmIrrigation/{id_farm}', [settingsController::class, 'regFarmIrrigation'])->name('regFarmIrrigation');
Route::post('regUnitDetailsIrrigation', [unitController::class,'regUnitDetailsIrrigation'])->name('regUnitDetailsIrrigation');

//water Resources
Route::get('WaterResorcesform', [settingsController::class,'WaterResorcesform'])->name('WaterResorcesform');
Route::get('regWaterResources/{id_farm}', [settingsController::class, 'regWaterResources'])->name('regWaterResources');
Route::post('regChah', [settingsController::class,'regChah'])->name('regChah');
Route::post('regPool', [settingsController::class,'regPool'])->name('regPool');
Route::post('regTank', [settingsController::class,'regTank'])->name('regTank');
Route::post('regRiver', [settingsController::class,'regRiver'])->name('regRiver');
Route::post('regPipe', [settingsController::class,'regPipe'])->name('regPipe');
Route::post('regChannel', [settingsController::class,'regChannel'])->name('regChannel');
Route::get('viewPits/{id_farm}', [settingsController::class, 'viewPits'])->name('viewPits');
Route::post('UpdateChah', [settingsController::class,'UpdateChah'])->name('UpdateChah');
Route::get('viewPools/{id_farm}', [settingsController::class, 'viewPools'])->name('viewPools');
Route::post('updatePool',[settingsController::class, 'updatePool'])->name('updatePool');
Route::get('viewTanks/{id_farm}', [settingsController::class, 'viewTanks'])->name('viewTanks');
Route::post('updateTank',[settingsController::class, 'updateTank'])->name('updateTank');
Route::get('viewRiver/{id_farm}', [settingsController::class, 'viewRiver'])->name('viewRiver');
Route::post('updateRiver',[settingsController::class, 'updateRiver'])->name('updateRiver');
Route::get('viewPipe/{id_farm}', [settingsController::class, 'viewPipe'])->name('viewPipe');
Route::post('updatePipe',[settingsController::class, 'updatePipe'])->name('updatePipe');
Route::get('viewChannel/{id_farm}', [settingsController::class, 'viewChannel'])->name('viewChannel');
Route::post('updateChannel',[settingsController::class, 'updateChannel'])->name('updateChannel');

// Station functions
Route::get('viewStation/{id_farm}', [stationPumpcontroller::class, 'viewStation'])->name('viewStation');
Route::post('RegStation',[stationPumpcontroller::class,'RegStation'])->name('RegStation');
Route::get('viewElectroPump/{id_farm}', [stationPumpcontroller::class,'viewElectroPump'])->name('viewElectroPump');
Route::post('RegElectroPump',[stationPumpcontroller::class,'RegElectroPump'])->name('RegElectroPump');
Route::post('EditElectroPump',[stationPumpcontroller::class,'EditElectroPump'])->name('EditElectroPump');
Route::get('viewDieselPump/{id_farm}', [stationPumpcontroller::class,'viewDieselPump'])->name('viewDieselPump');
Route::post('RegdieselPump',[stationPumpcontroller::class,'RegdieselPump'])->name('RegdieselPump');
Route::post('EditDieselPump',[stationPumpcontroller::class,'EditDieselPump'])->name('EditDieselPump');

// Fertilizing
Route::get('Fertilizeform', [FertilizeController::class, 'Fertilizeform'])->name('Fertilizeform');
Route::post('RegFertilizersCount', [FertilizeController::class, 'RegFertilizersCount'])->name('RegFertilizersCount');
Route::get('viewDefineFertilizePage/{id_farm}',[FertilizeController::class, 'viewDefineFertilizePage'])->name('viewDefineFertilizePage');
Route::post('RegFertilizer', [FertilizeController::class, 'RegFertilizer'])->name('RegFertilizer');
Route::post('EditFertilizeUnit',[FertilizeController::class, 'EditFertilizeUnit'])->name('EditFertilizeUnit');







