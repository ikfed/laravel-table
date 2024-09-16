<?php

namespace Ikfed\Table;

use Illuminate\Support\Facades\Blade;

class BladeDirectives
{
    public function register()
    {
        Blade::directive('cell', function ($expression) {
            [$name, $function] = self::parseTableCellDirectiveExpression($expression);

            //$name = Column::hashKey($name);

            return "<?php \$__env->slot('tableCell{$name}', {$function} { ?>";
        });

        Blade::directive('endcell', function () {
            return '<?php }); ?>';
        });
    }

    public static function parseTableCellDirectiveExpression(string $expression): array
    {
        preg_match("/('|\")([\w\-_\.]+)('|\")(,)?(\s*)(.*)/", $expression, $matches);

        $name = trim($matches[2] ?? '');

        $arguments = trim($matches[6] ?? '', '\[\]');

        $splitted = preg_split('/\],(\s*)/', $arguments);

        $slotArguments = trim($splitted[0] ?? '');
        $slotUses      = trim(ltrim($splitted[1] ?? '', '['));

        $slotUses = $slotUses ? "\$__env, {$slotUses}" : '$__env';

        $function = "function ({$slotArguments})";
        $function .= " use ({$slotUses})";

        return [$name, $function];
    }
}
