<input type="text" id="AccountNo" value="12" />
<input type="button" onclick="runEvaluator()" value="Run Evaluator" />

<script>
var conditions = {'type':'or', 'dynamicFieldRuleConditions':
                      [
                        {
                            'fieldKey':'AccountNo','fieldValue':'12','ruleComparator':'greaterThan'
                        },
                        {
                            'type':'and', 'dynamicFieldRuleConditions':
                            [
                                {
                                    'fieldKey':'AccountNo','fieldValue':'78','ruleComparator':'notEqual'
                                },
                                {
                                    'fieldKey':'AccountNo','fieldValue':'45','ruleComparator':'equal'
                                }
                            ]
                        }
                      ]
                  }

function DFREvaluator(conditions){
    if(conditions.type == 'or'){
        for(i=0; i<conditions.dynamicFieldRuleConditions.length; i++){
            if(conditions.dynamicFieldRuleConditions[i].type == undefined){
                if(evaluateCondition(document.getElementById(conditions.dynamicFieldRuleConditions[i].fieldKey).value, conditions.dynamicFieldRuleConditions[i].fieldValue, conditions.dynamicFieldRuleConditions[i].ruleComparator))
                {
                    return true;
                }
            }
            else{
                if(DFREvaluator(conditions.dynamicFieldRuleConditions)){
                    return true;
                }
            }
        }
        return false;
    }
    else if(conditions.type == 'and'){
        for(i=0; i<conditions.dynamicFieldRuleConditions.length; i++){
            if(conditions.dynamicFieldRuleConditions[i].type == undefined){
                if(!evaluateCondition(document.getElementById(conditions.dynamicFieldRuleConditions.fieldKey[i]).value, conditions.dynamicFieldRuleConditions[i].fieldValue, conditions.dynamicFieldRuleConditions[i].ruleComparator))
                {
                    return false;
                }
            }
            else{
                if(!DFREvaluator(conditions.dynamicFieldRuleConditions)){
                    return false;
                }
            }
        }
        return true;
    }
}

function evaluateCondition(left, right, comparator){
    if(comparator == 'greaterThan'){
        return left  > right;
    }
    else if(comparator == 'notEqual'){
        return left != right;
    }
    else if(comparator == 'equal'){
        return left  == right;
    }
    else if(comparator == 'lessThan'){
        return left  < right;
    }
    return false;
}

function runEvaluator(){
    alert('Should I Run Actions? ' + DFREvaluator(conditions));
}
</script>