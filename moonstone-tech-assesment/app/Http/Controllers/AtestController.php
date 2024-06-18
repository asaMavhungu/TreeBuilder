<?php


namespace App\Http\Controllers;

use App\Models\Atest;


class AtestController extends Controller
{
    public function index()
    {
        $items = Atest::all();

        $query = "clear";

        //$tree = $this->buildTree($items);
        $tree = $this->filterTree( $items, $query );
        $tree = $this->buildTree($tree);
        $tree = $this->buildTree($items);

        // pass the tree structure to the 'atest.index' view
        // the tree structure will be refered to as 'tree' in the view
        return view('atest.index', compact('tree')); 
    }

    private function filterTree($items, $query)
    {

        // filter out all the items that have the query as a substring
        $filteredItems = $items->filter(function ($item) use ($query) {
            return stripos($item->name, $query) !== false;
        });

        $tree = collect();
        // keep track of nodes already added to the tree
        $visitetedItems = collect();

        foreach ($filteredItems as $item) 
        {
            $currentItem = $item;


            while ($currentItem)
            {

                // get this items parent
                $parent = Atest::where('id', $currentItem->pef_item_id)->first();

                if ($parent)
                {
                    if (!$visitetedItems->contains($parent->id))
                    {
                        $tree->push($parent); // push this parent to the tree
                        $visitetedItems->push($parent->id); // mark parent as visited
                    }
                    $currentItem = $parent; // now we move to the parents of current parent
                }
                else
                {
                    $tree->push($currentItem); // no parent means this is a root node
                    break; // move to the next filteredIten
                }
            }

        }
        return $tree;
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