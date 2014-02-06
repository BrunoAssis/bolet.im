class RemoveYearFromClassrooms < ActiveRecord::Migration
  def change
    remove_reference :classrooms, :year, index: true
  end
end
