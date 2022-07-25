<?php

namespace App\Observers;

use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function created(Employee $employee)
    {
        //
    }

    /**
     * @param Employee $employee
     * @return void
     */
    public function updating(Employee $employee)
    {
        $this->deleteImage($employee->getOriginal('image'));
    }

    /**
     * Handle the Employee "updated" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function updated(Employee $employee)
    {
        //
    }

    /**
     * Handle the Employee "deleting" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function deleting(Employee $employee){
        $id = $employee->getAttributeValue('id');
        $head_id = $employee->getAttributeValue('head');
        $employee::where('head', $id)->update(['head' => $head_id]);

        $this->deleteImage($employee->getAttributeValue('image'));
    }

    /**
     * Handle the Employee "deleted" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function deleted(Employee $employee)
    {
        //
    }

    /**
     * Handle the Employee "restored" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function restored(Employee $employee)
    {
        //
    }

    /**
     * Handle the Employee "force deleted" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        //
    }

    private function deleteImage($imageName)
    {
        $file_name = explode('.', $imageName)[0] . '.jpg';
        $file_path_300 = 'public/images/300_' . $file_name;
        $file_path = 'public/images/' . $imageName;

        if (Storage::disk('local')->exists($file_path_300)) {
            Storage::delete($file_path_300);
        }
        if (Storage::disk('local')->exists($file_path)) {
            Storage::delete($file_path);
        }
    }
}
