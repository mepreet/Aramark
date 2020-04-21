import Foundation

class Meal{

var mealName: String
var servingSize : Double
var calories : Double
var caloriesFromFat: Double
var totalFat: Double
var saturatedFat: Double
var transFat: Double
var cholestrol: Double
var sodium: Double
var totalCarbs: Double
var dietaryFiber: Double
var sugar: Double

var price: Double

init(mealName:String,
servingSize : Double,
calories : Double,
caloriesFromFat: Double,
totalFat: Double,
saturatedFat: Double,
transFat: Double,
cholestrol: Double,
sodium: Double,
totalCarbs: Double,
dietaryFiber: Double,
sugar: Double,
price: Double){
    self.mealName = mealName
    self.servingSize = servingSize
    self.calories = calories
    self.caloriesFromFat = caloriesFromFat
    self.totalFat = totalFat
    self.saturatedFat = saturatedFat
    self.transFat = transFat
    self.cholestrol = cholestrol
    self.sodium = sodium
    self.totalCarbs = totalCarbs
    self.dietaryFiber = dietaryFiber
    self.sugar = sugar
    self.price = price
}
func getNutritionalInfo() -> Array<Double>
{
    var info = [Double]()
    info.append(self.servingSize)
    info.append(self.calories)
    info.append(self.caloriesFromFat)
    info.append(self.totalFat)
    info.append(self.saturatedFat)
    info.append(self.transFat)
    info.append(self.cholestrol)
    info.append(self.sodium)
    info.append(self.totalCarbs)
    info.append(self.dietaryFiber)
    info.append(self.sugar)

    return info
}

func getPrice() -> Double
{
    return self.price
}

}