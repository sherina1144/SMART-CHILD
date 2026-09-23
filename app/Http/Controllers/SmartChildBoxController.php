<?php

namespace App\Http\Controllers;

use App\Models\SmartChildBox;

class SmartChildBoxController extends Controller
{
    public function index()
    {
        $boxes = SmartChildBox::with([
            'items.product'
        ])
        ->orderBy('urutan')
        ->get();

        $activeBoxId = request('box');

        if ($activeBoxId) {

            $activeBox = $boxes->firstWhere(
                'box_id',
                $activeBoxId
            );

        } else {

            $activeBox = $boxes->first();

        }

        if (!$activeBox) {
            abort(404);
        }

        return view(
            'user.shop.smart_childbox',
            compact(
                'boxes',
                'activeBox'
            )
        );
    }
}