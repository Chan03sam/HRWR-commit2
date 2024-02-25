<style>
    .form-group{
        margin-bottom: 12px;
    }
    .side-container{
        position: relative;
        left: 12px;
        background-color: #F8F1F6;
        padding-top: 24px;
        padding-bottom: 15px;
        padding-left: 5px;
        padding-right: 5px;
        border-radius: 5px;
    }
    .form-control{
        border: solid 1px grey;
    }
</style>


<div class="row container-fluid side-container row">
    <div class="col-md-3 col-sm-3 col-lg-3">
        <div class="row">
            <div class="form-group">
                <label for="alertLevel">Import File:</label>
                <input type="file" name="excel" required value="">
            </div>
            <div class="form-group">
                <button type="submit" name="import" class="form-control btn btn-success" style="border: none;">Submit</button>
            </div>
            <div class="form-group">
                <label for="employeeID">Employee ID:</label>
                <input type="text" name="employeeID" id="employeeID" class="form-control">
            </div>
            <div class="form-group">
                <label for="division" class="control-label text-navy">Division:</label>
                <select name="division" id="division" class="form-control form-control-border" required>
                <option value="" disabled selected>Please Select...</option>
                    <option value="Accounting and Finance">Accounting and Finance</option>
                    <option value="Administration">Administration</option>
                    <option value="Central Purchase">Central Purchase</option>
                    <option value="Data Privacy Compliance">Data Privacy Compliance</option>
                    <option value="Diecast">Diecast</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="One NCF">One NCF</option>
                    <option value="Parts and Components">Parts and Components</option>
                    <option value="Parts Quality Assurance">Parts Quality Assurance</option>
                    <option value="Production">Production</option>
                    <option value="Production Control">Production Control</option>
                    <option value="Quality Assurance">Quality Assurance</option>
                </select>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <select name="department" id="department" class="form-control">
                <option value="" disabled selected>Please Select...</option>
                </select>
            </div>
            <div class="form-group">
                <label for="remarks">Remarks:</label>
                <select name="remarks" id="remarks" class="form-control">
                <option value="" disabled selected>Please Select...</option>
                    <option value="compress">COMPRESS</option>
                    <option value="compressCovid">COMPRESS - COVID</option>
                    <option value="shifting">SHIFTING</option>
                    <option value="shiftingCovid">SHIFTING - COVID</option>
                    <option value="workingDays">WORKING DAYS</option>
                </select>
            </div>
            </div>
            <div class="form-group">
                <label for="employeeID">Date From:</label>
                <input type="date" name="employeeID" id="employeeID" class="form-control">
            </div>
            <div class="form-group">
                <label for="employeeID">Date To:</label>
                <input type="date" name="employeeID" id="employeeID" class="form-control">
            </div>
            <div class="form-group">
                <button class="form-control btn btn-primary" style="border: none;">Payroll View</button>
            </div>
            <div class="form-group">
                <button class="form-control btn btn-primary" style="border: none;">View P.I.C</button>
            </div>
            <div class="form-group">
                <button class="form-control btn btn-success" style="border: none;">Download</button>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="alertLevel">Alert Level:</label>
                <select name="alertLevel" id="alertLevel" class="form-control">
                <option value="" disabled selected>Please Select...</option>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alertLevel">Attach File:</label>
                <input type="file" required value="">
            </div>
            <div class="form-group">
                <button class="form-control btn btn-success" style="border: none;">Send File</button>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-lg-9">
            <?php require_once('details.php') ?>
        </div>
    </div>
</div>