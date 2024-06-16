def convert_data(input_file, output_file):
    with open(input_file, 'r') as f_in, open(output_file, 'w') as f_out:
        for line in f_in:
            # remove leading and trailing brackets and comma
            line = line.strip().strip(',()')
            # split by comma and convert to list of elements
            elements = line.split(',')
            # extract values
            id_value = int(elements[0].strip())
            name_value = elements[1].strip().strip("'")
            pef_item_id_value = elements[2].strip()
            try:
                pef_item_id_value = int(pef_item_id_value)
            except:
                pass
            order_no_value = int(elements[3].strip())

            # write formatted data to output file
            f_out.write(f"['id' => {id_value}, 'name' => '{name_value}', 'pef_item_id' => {pef_item_id_value}, 'order_no' => {order_no_value}],\n")


input_file = './input.txt'
output_file = './output.txt'
convert_data(input_file, output_file)
