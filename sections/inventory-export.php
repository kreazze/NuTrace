<?php
    require __DIR__ . '/../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $sql_query = "SELECT date, croptype, quantity, harvester, status FROM tbl_inventory";
    $conn = new mysqli("localhost", "u158858399_root", "?QKZg9PRv4Ns", "u158858399_nutrace_server");
    $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
    $developer_records = array();

    while ($rows = mysqli_fetch_assoc($resultset)) {
        $developer_records[] = $rows;
    }

    if (isset($_POST["export_data"])) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the headers
        $sheet->setCellValue('A1', 'Date');
        $sheet->setCellValue('B1', 'Crop Type');
        $sheet->setCellValue('C1', 'Quantity');
        $sheet->setCellValue('D1', 'Harvester');
        $sheet->setCellValue('E1', 'Status');

        // Apply formatting to the headers
        $headerStyle = $sheet->getStyle('A1:E1');
        $headerStyle->getFont()->setBold(true);
        $headerStyle->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFA0A0A0');
        $headerStyle->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Add the data rows
        $row = 2;
        foreach ($developer_records as $record) {
            $sheet->setCellValue('A' . $row, $record['date']);
            $sheet->setCellValue('B' . $row, $record['croptype']);
            $sheet->setCellValue('C' . $row, $record['quantity']);
            $sheet->setCellValue('D' . $row, $record['harvester']);
            $sheet->setCellValue('E' . $row, $record['status']);
            $row++;
        }

        // Apply formatting to the data rows
        $dataStyle = $sheet->getStyle('A2:E' . ($row - 1));
        $dataStyle->getAlignment()->setWrapText(true);

        // Auto-size columns
        foreach (range('A', 'E') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Set document properties
        $spreadsheet->getProperties()
            ->setCreator('Microsoft Excel')
            ->setTitle('Duran Farm Inventory')
            ->setSubject('Inventory Data');

        // Create a writer and save the spreadsheet
        $writer = new Xlsx($spreadsheet);

        $filename = "duran-farm-inventory" . date('Ymd') . ".xlsx";
        $writer->save($filename);

        // Set the appropriate headers for the file download
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Cache-Control: max-age=0");

        // Output the file to the browser
        $writer->setIncludeCharts(true);
        $writer->save('php://output');
        exit;
    }
?>
