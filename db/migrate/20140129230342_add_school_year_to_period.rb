class AddSchoolYearToPeriod < ActiveRecord::Migration
  def change
    add_reference :periods, :school_year, index: true
  end
end
