<div class="container">
    <?php if($this->session->flashdata('flashSuccess')):?>
        <div class='alert alert-success alert-dismissable'>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?=$this->session->flashdata('flashSuccess')?>
        </div>
    <?php endif?>

    <?php if($this->session->flashdata('flashError')):?>
        <div class='alert alert-danger alert-dismissable'>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?=$this->session->flashdata('flashError')?>
        </div>
    <?php endif?>
    <h3>Account Ledger</h3>
    <!-- table here -->

    <table class="table table-striped table-bordered">
        <tbody>
        <tr>
            <th>Date</th>
            <th>Details</th>
            <th>Reference</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Balance</th>
        </tr>
        <?php
            //var_dump($results);
            if(count($results) > 0) {
                $tempRating = "";
                $balance = 0;
                $legend = "";
                foreach ($results as $result) {
                    if ($result->debit) {
                        $balance += $result->debit;
                        $legend = " dr";
                    } else {
                        $balance -= $result->credit;
                        $legend = " cr";
                    }

                    $debit = $result->debit == 0 ? $result->debit : "";
                    $credit = $result->credit == 0 ? $result->credit : "";
                    
                    echo "<tr>";
                    echo "<td>".date("Y-m-d h:i A",strtotime($result->created_date))."</td>";
                    echo "<td>".$result->details."</td>";
                    echo "<td>".$result->reference."</td>";
                    echo "<td>".$result->debit."</td>";
                    echo "<td>".$result->credit."</td>";
                    echo "<td>".$balance.$legend."</td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td colspan='5'>Total Balance</td>";
                echo "<td>".$balance."</td>";
                echo "</tr>";
                if ($balance > 4000) {
                    echo "<tr>";
                    echo "<td colspan='6'>Your Balance is ".$balance." in your account. Time to spend or save more</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan='9' style='text-align: center'>No records retrieved</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</div>