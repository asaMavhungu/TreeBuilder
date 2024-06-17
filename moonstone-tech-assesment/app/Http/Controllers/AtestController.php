<?php


namespace App\Http\Controllers;

use App\Models\Atest;


class AtestController extends Controller
{
    public function index()
    {
        $items = Atest::all();
        $tree = $this->buildTree($items);

        // pass the tree structure to the 'atest.index' view
        // the tree structure will be refered to as 'tree' in the view
        return view('atest.index', compact('tree')); 
    }

    private function buildTree($items)
    {
        $grouped = $items->groupBy('pef_item_id');
        /**
         * iterates through each item in the $items collection.
         * checks if there are items ($grouped->has($item->id)) that have 
         * the current item's id as their pef_item_id.
         * if true, assigns these items as children to the current $item.
         */
        foreach ($items as $item) 
        {
            if ($grouped->has($item->id))
            {

                $item->children = $grouped->get($item->id);
            }
        }
        // Return the Root items
        return $grouped->get(null);
    }
}