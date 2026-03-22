# com.joineryhq.fpptasumfields

## FPPTA Summary Fields

The extension is licensed under [GPL-3.0](LICENSE.txt).

Custom for FPPTA:
Provides additional fields under the [Summary Fields](https://civicrm.org/extensions/summary-fields) framework.

## Additional fields

This extension currently provides the following fields:

* _FPPTA: Last Membership Payment: Info_: Information on the last membership payment, 
  in the format "DATE (INV_NO)", where DATE is the Received Date of the contribution, 
  and INV_NO is its Invoice Number. Like other fields under Summary Fields' "Membership" 
  section, this field responds to the "Financial Types" filter settings for that section.


## Requirements

* Extension: [Summary Fields](https://civicrm.org/extensions/summary-fields)

## Configuration

* After installing, navigate  to `Adminster -> Customize Data and Screens -> Summary Fields`.
* Under the Membership section, enable the appropriate fields, and optionally configure the "Financial Type" filter setting.

## See also
[Summary Fields Documentation](https://github.com/progressivetech/net.ourpowerbase.sumfields/blob/master/README.md)

## Support

Support for this package is handled under Joinery's ["As-Is Support" policy](https://joineryhq.com/software-support-levels#as-is-support).

Public issue queue for this package: https://github.com/JoineryHQ/com.joineryhq.fpptasumfields/issues