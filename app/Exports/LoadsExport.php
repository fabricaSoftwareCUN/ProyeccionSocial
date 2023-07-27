<?php

namespace App\Exports;

use App\Models\Load;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LoadsExport implements FromView, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function view(): View
  {
    return view('loads.exportLoads', [
      'loads' => Load::all()
    ]);
  }
}
